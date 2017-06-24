<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Package;
use App\Tag;
use App\Usecourse;
use App\User;
use App\Course;
use App\Discount;
use App\Finance;

use App\Userdiscount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Database\Eloquent\Relations;
use Illuminate\Contracts\Database;
use Illuminate\Validation;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent;
use Illuminate\Session;
use Laravel\Socialite\Facades\Socialite;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use File;


class UserController extends Controller
{
    /**
     * Display a listing of the courses with teachers , rate , number of reviews , durations , number of section , category .
     *
     * @return $courses;
     */
    public function index()
    {
        $user=\Auth::user();
        //$user = User::find(1);
        if(isset($user)) {
            $favourites = $user->favourites()->get();
            $fav=[];
            foreach($favourites as $fv){
                $fav[]=$fv->id;
            }
            $tags = Tag::all();
            $courses = $user->courses()->get();
            $packages = $user->packages()->get();
            $finance = $user->finance()->get();
            $discounts = $user->discounts()->get();
        }
        else{
            $favourites = [];
            $tags = [];
            $courses = [];
            $packages = [];
            $finance = [];
            $discounts = [];

        }
        return view('profile',['user'=>$user,'fav'=>$fav,'favourites'=>$favourites,'tags'=>$tags,'courses'=>$courses,'packages'=>$packages,'finance'=>$finance,'discounts'=>$discounts]);

    }
    /*
     * 
     */
    public function incrCredit()
    {
        $input=Input::all();
        
    }
    /*
     *
     */
    public function update(){
        $user=\Auth::user();
        //$user = User::find(1);
        $tags = Input::get('tags');
        $favourites = $user->favourites()->get();
        $user->favourites()->detach();
        if(! is_null($tags)) {
            foreach ($tags as $field) {
                if (!$user->favourites()->where('tag_name', $field)->first()) {
                    $new = Tag::where('tag_name', $field)->first();
                    $user->favourites()->attach($new->id);
//                    $user->favourites()->associate($field);
                    $user->save();
                }
            }
        }
        return redirect()->back();
    }
    /*
     * 
     */
    public function edit()
    {
        $input = Input::all();
        $user=\Auth::user();
        //$user = User::find(1);
       
        $messages = array(
            'name.required' => 'لطفا نام معتبری وارد نمایید' ,
            'name.max' => 'نام شما بیش از حد طولانی می باشد ',
            'mobile.required'   => 'موبایل الزامی است.',
            'mobile.min'        => 'موبایل شما معتبر نیست.',
            'mobile.regex' =>'فرمت شماره تماس درست نیست از فرمت مثالی ۰۹۳۰۱۱۰۱۰۱۰ استفاده نمایید.'
        );
        $rules = array(
            'name'      => 'required|max:255',
            'mobile'    => 'required|max:11|min:11|regex:/(09)[0-9]{9}/'
        );
        $validator = Validator::make(Input::all(), $rules, $messages);
        if (!$validator->fails()) {
            $user->name = $input['name'];
            $user->mobile = $input['mobile'];
            $user->save();


            try{
                return Redirect::back();
            }
            catch ( \Illuminate\Database\QueryException $e){
                return Redirect::back()->withErrors(['errorr'=>'. مشکلی در ثبت پیام شما به وجود آمد مججدا تلاش بفرمایید']);
            }

        }
        else{
            //$failedRules = $validator->failed();
            //return $failedRules;
            return Redirect::back()->withErrors($validator)->withInput();
        }

    }
    /*
     * Socialite google
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        try
        {
            $user = Socialite::driver('google')->user();
            return view('dashboard')->with('user',$user);
        }
        catch (Exception $e)
        {
            return redirect('auth/google');
        }
    }

    /**
     * take a course for a user
     */
    public function takecourse($course)
    {
        $user=\Auth::user();
       {
            $price = Usecourse::find($course->id)->price;
            $code = Input::get('Code');
            if($code) {
                $discount = Discount::where('code', $code)->first();
                $userdiscount = Userdiscount::where([['code', $code],['user_id',$user->id]])->first();
                if (is_null($discount) and  is_null($userdiscount)) {
                    $response['error'] = 1; // not such a code in valid
                    $response['price'] = $price;
                    return $response;
                } else {
                    if(!is_null($discount)) {
                        if ($discount->count <= 0 or $discount->enable == 0) {
                            $response['error'] = 2; // not available as it is expired
                            $response['price'] = $price;
                            return $response;
                        } else {
                            $discount->count -= 1;
                            $discount->save();
                            $response['error'] = 0; // there is no error
                            if ($discount->type == 0) {
                                $newprice = $price * $discount->value / 100;
                            } else {
                                $newprice = $price - $discount->value;
                            }
                            $response['price'] = $newprice;
                            $user->courses->attach($course->id, [['paid' => '0'], ['discount_used' => $code]]);

                            $this->creditpay($newprice);

                            return $response;
                        }
                    }
                    else {
                        if ($userdiscount->enable == 0) {
                            $response['error'] = 2; // not available as it is expired
                            $response['price'] = $price;
                            return $response;
                        } else {
                            $response['error'] = 0; // there is no error
                            if ($userdiscount->type == 0) {
                                $newprice = $price * $userdiscount->value / 100;
                            } else {
                                $newprice = $price - $userdiscount->value;
                            }
                            $response['price'] = $newprice;
                            $user->courses->attach($course->id, [['paid' => '0'], ['discount_used' => $code]]);

                            $this->creditpay($newprice);

                            return $response;
                        }
                    }
                }
            }

           return Redirect::to('users.pay');

//          return dd($course->id);
            //$user->courses->attach($course->id, [['paid' => '0'],['discount_used' => '0']]);
            // redirect
        }
    }
    /**
     * take a course for a user by campaign
     */
    public function takecoursebycampaign($course,$campaign)
    {
        $user=\Auth::user();
        $price = Usecourse::find($course->id)->price;
        $response['error'] = 0; // there is no error
        #todo specify campaign id
        $campaign =  Usecourse::find($course->id)->campaigns->find($campaign->id);
        if ($campaign->discount_type == 0) {
            $newprice = $price * $campaign->discount_type / 100;
        } else {
            $newprice = $price - $campaign->discount_type;
        }
        $response['price'] = $newprice;
        //$user->courses->attach($course->id, [['paid' => '0'], ['discount_used' => '1']]);

        $this->creditpay($newprice);

        // redirect
        return Redirect::to('users.pay');

    }
    /**
     * take a course for a user
     */
    public function takepack($pack_id)
    {
        $rules = array(
            'Name'       => 'required|Min:3|Max:80',
            'FName'      => 'required|Min:3|Max:80',
            'Email'      => 'required|Between:3,64|Email',
            'Mobile'     => 'required|Min:11|Max:12'
        );
        $messages = [
            'Name.required'        => 'وارد کردن نام شما ضروری است ',
            'FName.required'        => 'وارد کردن نام خنوادگی شما ضروری است ',
            'Email.required'       => 'وارد کردن ایمیل شما ضروری است ',
            'Mobile.required'      => 'وارد کردن موبایل  شما ضروری است ',
            'Name.min'             => 'نام کامل خود را وارد نمایید ( حداقل 3 کاراکتر) ',
            'Email.email'          => 'ایمیل معتبر نیست',
            'Mobile.min'           => 'شماره وارد شده نامعتبر است.'
        ];
        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()) {
            return Redirect::to('users/create')
                ->withErrors($validator)
                ->withInput(Input::expect('password'));
        } else {
            if(is_null(User::where(['email',Input::get('Email')])->first())) {
                // store
                $user = new User;
                $user->name       = Input::get('Name'). ' ' .Input::get('FName');
                $user->email      = Input::get('Email');
                $user->mobile     = Input::get('Mobile');
                $user->save();
                $user->packages()->attach(dd($pack_id));
            }
            else{
                $user = User::where(['email',Input::get('Email')])->first();
                $user->packages->attach(dd($pack_id), [['paid' => '0'],['discount_used' => '0']]);
            }
            // redirect
            return Redirect::to('users.pay');
        }
    }
    /**
     * @param  $teacher_id
     * return review
     */
    public function teacherreview($id)
    {
        $teacher_id = $id;
        $rules = array(
            'Name'       => 'required|Min:3|Max:80',
            'Email'      => 'required|Between:3,64|Email',
            'Review'     => 'Required|Min:3',
            'Rate'       => ''
        );
        $messages = [
            'Name.required'        => 'وارد کردن نام شما ضروری است ',
            'Email.required'       => 'وارد کردن ایمیل شما ضروری است ',
            'Review.required'      => 'وارد کردن نظر  شما ضروری است ',
            'Review.min'           => 'حداقل 3 کاراکتر لازم است'
        ];
        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()) {
            return Redirect::to('users')
                ->withErrors($validator);
        } else {
            if(is_null(User::where(['email',Input::get('Email')])->first())) {
                // redirect
                Session::flash('message', 'مشخصات شما ثبت نشده است.');
                return Redirect::to('users');
            }
            else{
                $user = User::where(['email',Input::get('Email')])->first();
                $user=User::find($user->id);
                if(!Input::get('Rate')){
                    $user->teacherreviews->save($teacher_id, [['comment' => Input::get('Comment')],['rate' => Input::get('Rate')],['enable' => '0']]);
                }
                else{
                    $user->teacherreviews->save($teacher_id, [['comment' => Input::get('Comment')],['enable' => '0']]);
                }
            }

            return Redirect::to('users');
        }
    }
    /**
     * @param get course id whose review
     * return review
     */
    public function coursereview($id)
    {
        $course_id = $id;
        $rules = array(
            'Name'       => 'required|Min:3|Max:80',
            'Email'      => 'required|Between:3,64|Email',
            'Review'     => 'Required|Min:3',
            'Rate'       => ''
        );
        $messages = [
            'Name.required'        => 'وارد کردن نام شما ضروری است ',
            'Email.required'       => 'وارد کردن ایمیل شما ضروری است ',
            'Review.required'      => 'وارد کردن نظر  شما ضروری است ',
            'Review.min'           => 'حداقل 3 کاراکتر لازم است'
        ];
        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()) {
            return Redirect::to('users')
                ->withErrors($validator);
        } else {
            if(is_null(User::where(['email',Input::get('Email')])->first())) {
                // redirect
                Session::flash('message', 'مشخصات شما ثبت نشده است.');
                return Redirect::to('users');
            }
            else{
                $user = User::where(['email',Input::get('Email')])->first();
                $user=User::find($user->id);
                if(!Input::get('Rate')){
                    $user->coursereviews->save($course_id, [['comment' => Input::get('Comment')],['rate' => Input::get('Rate')],['enable' => '0']]);
                }
                else{
                    $user->coursereviews->save($course_id, [['comment' => Input::get('Comment')],['enable' => '0']]);
                }
            }
            // redirect
            return Redirect::to('users');
        }
    }
     /*
     * return favourites
     */
    public function favourites($user)
    {
        $favourites =  $user->favourites()->get();
        return $favourites;
    }
    /*
     *
     */
    #todo define credit pay
    public function creditpay($payment)
    {
        $amount = $payment;
        $redirect = redirect('/payagree'); //page to show status , transid , factorNumber , message as POST
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://pay.ir/payment/send');
        curl_setopt($ch, CURLOPT_POSTFIELDS,"amount=$amount&redirect=$redirect");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result);
        if($result->status) {
            $go = "https://pay.ir/payment/gateway/$result->transId";
            header("Location: $go");
        } else {
            echo $result->errorMessage;
        }

//        $MerchantID = 'XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX'; //Required
//        $Amount = $payment; //Amount will be based on Toman - Required
//        $Description = 'توضیحات تراکنش تستی'; // Required
//        $Email =  $user->email;
//        $Mobile = $user->mobile;
//        $CallbackURL = 'http://www.yoursoteaddress.ir/verify.php'; // Required
//
//
//        $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);
//
//        $result = $client->PaymentRequest(
//            [
//                'MerchantID' => $MerchantID,
//                'Amount' => $Amount,
//                'Description' => $Description,
//                'Email' => $Email,
//                'Mobile' => $Mobile,
//                'CallbackURL' => $CallbackURL,
//            ]
//        );
//
//        //Redirect to URL You can do it also by creating a form
//        if ($result->Status == 100) {
//            // Here Comes the Codes of before redirection and info
//            Session::put('Amount', $Amount);
//            // Redirection proccess
//            return redirect('https://www.zarinpal.com/pg/StartPay/' . $result->Authority . '/ZarinGate');
//        } else {
//            return redirect('/bankerror');
//        }


    }
    /*
     *
     */
    public function payagree()
    {
        $user=\Auth::user();
        $transId = Input::get('transId');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://pay.ir/payment/verify');
        curl_setopt($ch, CURLOPT_POSTFIELDS, "transId=$transId");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($ch);
        curl_close($ch);
        $this->AdjustCredit($user->id);
        return $result;
    }
//    public function payagree()
//    {
//        $user=\Auth::user();
//        $MerchantID = '260906cc-2ed3-11e6-93b9-005056a205be';
//        // The Amount should be Updated
//        $Amount = Session::get('Amount'); //Amount will be based on Toman
//        $Authority = $_GET['Authority'];
//        if ($_GET['Status'] == 'OK') {
//            // URL also Can be https://ir.zarinpal.com/pg/services/WebGate/wsdl
//            $client = new \SoapClient('https://de.zarinpal.com/pg/services/WebGate/wsdl', array('encoding' => 'UTF-8'));
//            $result = $client->PaymentVerification(
//                array(
//                    'MerchantID' => $MerchantID,
//                    'Authority' => $Authority,
//                    'Amount' => $Amount
//                )
//            );
//            if ($result->Status == 100) {
//                $ref = $result->RefID;
//                // Saving the Data must be here
//                $code=Session::get('Plan');
//                Session::forget('Plan');
//                $service=new Service();
//                $user=\Auth::user();
//                $service->UserId=$user->UserId;
//                $service->PlanId=$code;
//                $service->StartDate=date('Y-m-d H:i:s');
//                $months=Plan::where('PlanId',$code)->first()->Period/30;
//                $final = strtotime(date("Y-m-d H:i:s", strtotime($service->StartDate)) . " +$months month");
//                $final = date("Y-m-d H:i:s",$final);
//                $service->FinishDate=$final;
//                $service->Count=0;
//                $service->IsActive=1;
//                $service->Token=$this->randString(16);
//                $service->save();
//                $data=array('Content'=>'سرویس به شماره ی ' .$service->ServiceId.' خریداری شد');
//                $this->html_email($data,'mail_theme',"خرید سرویس");
//                $data=array('Content'=>'سرویس به شماره ی ' .$service->ServiceId.' خریداری شد');
//                $this->user_email($data,'mail_theme',"خرید سرویس");
//
//                $this->AdjustCredit($user->id);
//
//                // Emailing the content should be here
//                // $this->sendmail(Session::get('payname'),$courseinfo->name,"$courseinfo->date"." $courseinfo->time",Session::get('payemail'));
//                // Earsaing Data saved should be here
//                Session::forget('Amount');
//                return redirect("/Services");
//            } else {
//                ;
//                $ref = $result->Status;
//                return redirect("/buyfalse");
//            }
//        } else {
//            $ref = 'شما انتقال را لغو کرده اید.';
//            return redirect("/buyfalse");
//        }
//    }
    /*
     *  Adjust Credit
     */
    public function AdjustCredit($payment)
    {
        $user=\Auth::user();
        if($this->HasFinance($user)!=-1)
        {
            $finance = User::with('finance')->find($user->id);
            $finance->finance->amount=$finance->finance->amount+$payment;
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
            $finance=new Finance();
            $finance->amount=$payment;
            $finance->user_id=$user->id;
            try{
                $finance->save();
            }
            catch ( \Illuminate\Database\QueryException $e){
                return 0;
            }
            return 1;
        }
    }
    public function HasFinance(User $user)
    {
        $amount=$user->finance;
//        echo $amount;
        if(is_null($amount))
        {
            return -1;
        }
        else
        {
            return 1;
        }
    }
}
