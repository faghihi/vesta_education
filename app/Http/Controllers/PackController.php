<?php

namespace App\Http\Controllers;

use App\Category;
use App\Package;
use App\PackageReview;
use App\Tag;
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
//       $pack['count_courses']=count($pack->courses);
//            $i=1;
//            foreach ($pack->courses as $course)
//            {
//                if($i==4){
//                    break;
//                }
//                $pack['relate'.$i]=$course->name;
//                $i++;
//            }
            $pack['courses'] = $pack->courses()->paginate(3);
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
        $pack = Package::findorfail($id);
        //package information
//        $pack['title']            =  $pack->title;
//        $pack['image']            =  $pack->image;
//        $pack['description']      =  $pack->description;
//        $pack['open_time']        =  $pack->open_time;
//        $pack['requirement']      =  $pack->requirement;
//        $pack['work_description'] =  $pack->work_description;
//        $pack['work_start']       =  $pack->work_start;
//        $pack['goal']             =  $pack->goal;
//        $pack['duration']         =  $pack->duration;
//        $pack['price']            =  $pack->price;

        //courses
        $courses = $pack->courses()->get();
        $teachers = $pack->teachers()->get();
        #todo it's just give reviews of one user
        $reviews = $pack->reviews()->wherePivot('enable', 1)->get();
//        return $reviews;
        //return  $reviews;
        $pack['rate'] = 0;
        foreach ($courses as $course){
            //rate
            foreach ($course->usecourse as $usecourse) {
                foreach ($usecourse->reviews as $review ) {
                    $pack['rate'] += $review->pivot->rate;
                }
            }
            $total = 0;
            foreach ($course->usecourse as $usecourse) {
                foreach ($usecourse->reviews as $review ) {
                    $total++;
                }
            }
            $pack['rate'] = $pack['rate']/$total;

            //category
            $course['category_name'] = $course->category->name;
            //course name
            $course['name'] = $course->name;
            
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
        return view('packages/package-single-item')->with(['pack'=>$pack,'reviews'=>$reviews,'teachers'=>$teachers,'courses'=>$courses,'tags'=>$tags,'categories'=>$categories]);

    }
    /**
     * Display the specified resource.
     *
     * @return boolean
     */
    public function Take(Package $pack,$payment,$discount,$period)
    {
        $StartDate=date('Y-m-d H:i:s');
        $days=$period;
        $final_time= strtotime(date("Y-m-d H:i:s", strtotime($StartDate)) . " +$days day");
        $final_time = date("Y-m-d H:i:s",$final_time);
        $user=\Auth::user();
        try {
            $user->packages()->attach($pack->id,['paid'=>$payment,'discount_used'=>$discount]);
        }
        catch ( \Illuminate\Database\QueryException $e){

            return 0;
        }
        return 1;
    }

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
//            $review = PackageReview::create([
//                'comment'   => $input['Comment'],
//                'rate'      => $rate,
//                'enable'    => 1,
//            ]);
            
            //$user->account()->associate($account);
            $user->packagereviews()->attach($id, ['comment' => $input['Comment'],'rate' => $rate,'enable' => 0]);
            $user->save();
//            return $user->packagereviews()->get();
//            $review = new Review(array('comment' => $input['Comment'],'enable' => 0));
            //$comment->user()->name = $input['Name'];
            //$review->packages()->pivot->comment = $input['Comment'];
            //$user = User::find(1);
            //$user->packagereviews()->save($review);
            //$pack->reviews()->associate($review);
            //$user->account()->associate($account);
//            $user = User::find(1)->get();
//
//            $user->packagereviews()->attach($id,['comment' => $input['Comment'],'enable' => 0]);
            try{
                return Redirect::back();
            }
            catch ( \Illuminate\Database\QueryException $e){
                return Redirect::back()->withErrors(['errorr'=>'. مشکلی در ثبت پیام شما به وجود آمد مججدا تلاش بفرمایید']);
            }

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
//        $user = User::find(1);
        if(isset($user))
            $finance = $user->finance()->first();
        else
            $finance = 0;
        return view('BuyOperations.shop-cart')->with(['package'=>$pack,'finance'=>$finance]);
    }
    /*
     *
     */
    public function send()
    {
        $input = Input::all();
        $course = Usecourse::findorfail($input['id']);
        // send
        $amount = $course->price*10000; // به ریال
        $api = 'API';
        $redirect = 'Callback';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://pay.ir/payment/send');
        curl_setopt($ch, CURLOPT_POSTFIELDS,"api=$api&&amount=$amount&redirect=$redirect");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result);
        $transId = $result->transId;
        if($result->status) {
            $go = "https://pay.ir/payment/gateway/$result->transId";
            $go = view('BuyOperations.shop-cart-approval')->with(['transId'=>$transId,'course'=>$course]);
            header("Location: $go");
        } else {
            echo $result->errorMessage;
        }
        // end send

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
}
