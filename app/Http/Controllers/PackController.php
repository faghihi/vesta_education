<?php

namespace App\Http\Controllers;

use App\Category;
use App\Discount;
use App\Package;
use App\PackageReview;
use App\Tag;
use App\Transactions;
use App\Usecourse;
use App\User;
use App\Review;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;



class PackController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Response
     */
    public function index()
    {
        $packs=Package::withCount('users')->orderBy('users_count', 'desc')->paginate(6);
        foreach ($packs as $pack){
            $pack['courses'] = $pack->courses;
            }

        return view('packages/packages-list')->with(['packs'=>$packs]);

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Response
     */
    public function show($id)
    {
        $enable=0;
        if(\Auth::check()){
            $enable=1;
        }
        $pack = Package::findorfail($id);

        //courses
        $courses = $pack->courses()->get();
        $teachers = $pack->teachers()->get();
        #todo it's just give reviews of one user
        $reviews = $pack->reviews()->wherePivot('enable', 1)->get();
//        return $reviews;
        //return  $reviews;
        $pack['rate'] = 0;
        foreach ($courses as $course){
                foreach ($course->reviews as $review ) {
                    $pack['rate'] += $review->rate;
                }
            $total = 0;
                foreach ($course->reviews as $review ) {
                    $total++;
                }
            $pack['rate'] = $pack['rate']/$total;

            //category
            $course['category_name'] = $course->course->category->name;
            //course name
            $course['name'] = $course->course->name;
            
        }
        $pack['courses']=$courses;
        $pack['course_count'] = count($courses);
            /// how to use courses data of pack
            //foreach($pack['courses'] as $course){
            //    echo $course['introduction'];
            //}
        $tags=Tag::all();
        $categories=Category::all();
        //return view('courses.courses-list')->with(['Data'=>$courses,'Search'=>'1','Tags'=>$tags,'Categories'=>$Categories,'Pack'=>$pack]);
        return view('packages/package-single-item')->with(['comment_enable'=>$enable,'pack'=>$pack,'reviews'=>$reviews,'teachers'=>$teachers,'courses'=>$courses,'tags'=>$tags,'categories'=>$categories]);

    }
    /**
     * Display the specified resource.
     *
     * @return boolean
     */


    public function review()
    {
        $user=\Auth::user();
//        $user = User::find(1);
        $input = Input::all();
        $id = $input['id'];
        $rules = array(
            'Comment'   => 'Required'
        );
        $messages = [
            'Comment.required' => 'وارد کردن پیام  شما ضروری است ',
            'Comment.min' => 'حداقل ۷ کاراکتر لازم است'
        ];
        if(isset($input['1']))$rate=1;
        if(isset($input['2']))$rate=2;
        if(isset($input['3']))$rate=3;
        if(isset($input['4']))$rate=4;
        if(isset($input['5']))$rate=5;

        $validator = Validator::make($input,$rules,$messages);
        $pack = Package::findorfail($id);

        if (!$validator->fails()) {
            try{
                $user->packagereviews()->attach($id, ['comment' => $input['Comment'],'rate' => $rate,'enable' => 0]);
            }
            catch ( \Illuminate\Database\QueryException $e){
                return Redirect::back()->withErrors(['errorr'=>'. مشکلی در ثبت پیام شما به وجود آمد مججدا تلاش بفرمایید']);
            }
            return Redirect::back();

        }
        else{
            return Redirect::back()
                ->withErrors($validator)->withInput();
        }
        
    }
    /*
     *
     */
    public function buy($id)
    {
        $pack=Package::findorfail($id);
        $user=\Auth::user();
        foreach ($user->packages as $package){
            if($package->id==$id)
                return redirect()-back();
        }
//        $user = User::find(1);
        if(isset($user))
            $finance = $user->finance()->first();
        else
            $finance = 0;
        return view('packages.shop-cart')->with(['package'=>$pack,'finance'=>$finance]);
    }

    function send($api, $amount, $redirect, $factorNumber=null) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://pay.ir/payment/send');
        curl_setopt($ch, CURLOPT_POSTFIELDS,"api=$api&amount=$amount&redirect=$redirect&factorNumber=$factorNumber");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $res = curl_exec($ch);
        curl_close($ch);
        return $res;
    }

    /*
     *
     */
    public function verify($api, $transId)
    {
        //verify
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://pay.ir/payment/verify');
        curl_setopt($ch, CURLOPT_POSTFIELDS, "api=$api&transId=$transId");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $res = curl_exec($ch);
        curl_close($ch);
        return $res;
        //verify
    }

    public function PackageBuy($id)
    {
        $input=Input::all();
        $package = Package::findorfail($id);
        $user=\Auth::user();
        foreach ($user->packages as $package){
            if($package->id==$id)
                return redirect('/packages-grid');
        }
        $amount = $package->price*10000;
        // به ریال
        $api = 'ad19e8fe996faac2f3cf7242b08972b6';
        $redirect = 'http://vestacamp.vestaak.com/package/verify';
        $result = $this->send($api,$amount,$redirect);
        $result = json_decode($result);
        if($result->status) {
            $trans=new Transactions();
            $trans->user_id=\Auth::user()->id;
            $trans->transid=$result->transId;
            $trans->amount=$amount;
            $trans->type='Package.'.$package->id;
            try{
                $trans->save();
            }
            catch ( \Illuminate\Database\QueryException $e){
                return $redirect('packages-grid');
            }
            $go = "https://pay.ir/payment/gateway/$result->transId";
            return redirect($go);
        } else {
            return $result->errorMessage;
//            return $result;
        }

    }

    public function PackageBuyVerify()
    {
        $api = 'ad19e8fe996faac2f3cf7242b08972b6';
        $transId = $_POST['transId'];
        $result = $this->verify($api,$transId);
        $result = json_decode($result);
        $trans=Transactions::where('transid',$transId)->first();
        if(is_null($trans) || $trans->user_id!=\Auth::id() || $result->status!=1 || $result->amount!=$trans->amount){
//            return redirect('/pay?error=error');
            return $result->errorMessage;
        }
        $pieces = explode(".", $trans->type);
        $package=Package::findorfail(intval($pieces[1]));
        $res=$this->takePackage($package,\Auth::user());
        if(! $res['error']){
            $trans->condition=1;
            try{
                $trans->save();
            }
            catch ( \Illuminate\Database\QueryException $e){
                return $response['error']=1;
            }

            return  view('packages.shop-cart-approval')->with(['transId'=>$transId,'package'=>$package,'price'=>$trans->amount/10000]);
        }
        else{
//            return redirect('/pay?error=error');
            return $res;
        }
    }

    public function takePackage(Package $package,User $user)
    {
        $response=[];
        $response['error']=0;
        $price = $package->price;
        try{
            $user->packages()->attach($package->id, ['paid' =>$price , 'discount_used' => '0']);
        }
        catch ( \Illuminate\Database\QueryException $e){
            return $response['error']=1;
        }
        $response['price']=$price;
        return $response;
    }

    public function PackageBuycredit($id)
    {
        $response=[];
        $input=Input::all();
        $package=Package::findorfail($id);
        return $package;
        $price = $package->price;
        $user=\Auth::user();
        foreach ($user->packages as $package){
            if($package->id==$id)
                return redirect('/packages-grid');
        }
        $response['error']=0;
        $response['price']=$price;
        $bb=$this->BuyWithCredit($price);
        if($bb){
            try{
                $user->packages()->attach($package->id, ['paid' =>$price , 'discount_used' => '0']);
            }
            catch ( \Illuminate\Database\QueryException $e){
                $response['error']=$e;
                return $response;
            }
        }
        else{
            $response['error']=11;
            return $response;
        }
        return  view('packages.shop-cart-approval')->with(['transId'=>'پرداخت از اعتبار','package'=>$package,'price'=>$response['price']]);
    }

    public function Finance($user)
    {
        $amount=$user->finance;
//        echo $amount;
        if(is_null($amount))
        {
            return 0;
        }
        else
        {
            return $amount->amount;
        }
    }

    public function BuyWithCredit($payment)
    {
        $user=\Auth::user();
        if($this->Finance($user) > $payment)
        {
            $finance = User::with('finance')->find($user->id);
            $finance->finance->amount=$finance->finance->amount-$payment;
            try{
                $finance->push();
            }
            catch ( \Illuminate\Database\QueryException $e){
                return 0;
            }
            return 1;
        }
        else
        {
            return 0;
        }

    }

}
