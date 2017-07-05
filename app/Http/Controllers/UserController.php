<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Invite;
use App\Package;
use App\Tag;
use App\Transactions;
use App\Usecourse;
use App\User;
use App\Course;
use App\Discount;
use App\Finance;

use App\Userdiscount;
use Doctrine\DBAL\Types\Type;
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
            $finance = $user->finance;
            $discounts = $user->discounts()->get();
            $messages=$user->messages;
            $invitations=$user->invited;
        }
        else{
            $favourites = [];
            $tags = [];
            $courses = [];
            $packages = [];
            $finance = [];
            $discounts = [];

        }
        $errs=0;
        $sucess=0;
        if(Input::has('success')){
            $sucess=1;
        }
        elseif(Input::has('error')){
            $errs=1;
        }


        $certificates=$user->certifications;
//        return $certificates;
        foreach ($certificates as $cf){
            $cf['course_name']=Usecourse::find($cf->id)->course->name;
//            return Usecourse::find($cf->id);
        }

        return view('profile',['errs'=>$errs,'sucess'=>$sucess,'user'=>$user,'fav'=>$fav,'invitations'=>$invitations,'certifications'=>$certificates,'messages'=>$messages,'favourites'=>$favourites,'tags'=>$tags,'courses'=>$courses,'packages'=>$packages,'finance'=>$finance,'discounts'=>$discounts]);

    }
    /*
     * 
     */
    public function incrCredit()
    {
        $input=Input::all();
        $user=\Auth::user();
        if(!isset($input['credit']) || $input['credit'] < 1000)
        {
          return redirect('/profile');
        }
        $amount = $input['credit']*10; // به ریال
        $api = 'ad19e8fe996faac2f3cf7242b08972b6';
        $redirect = 'http://vestacamp.vestaak.com/credit/verify';
        $result = $this->send($api,$amount,$redirect);
        $result = json_decode($result);
        if($result->status) {
            $trans=new Transactions();
            $trans->user_id=\Auth::user()->id;
            $trans->transid=$result->transId;
            $trans->amount=$amount;
            $trans->save();
            $go = "https://pay.ir/payment/gateway/$result->transId";
            echo 1;
//            $go = view('BuyOperations.credit-approval')->with(['transId'=>$transId,'finance'=>$finance]);
           return redirect($go);
        } else {
            $message="مشکلی در ارتباط با درگاه به وجود آمده است، لطفا کمی بعد تلاش کنید.";
            return view('pay-error.pay-error')->with(['message'=>$message]);
//            return $result->errorMessage;
//            return $result;
        }
        // end send

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

    public function verifycredit()
    {
        $api = 'ad19e8fe996faac2f3cf7242b08972b6';
        $transId = $_POST['transId'];
        $result = $this->verify($api,$transId);
        $result = json_decode($result);
        $trans=Transactions::where('transid',$transId)->first();
        if(is_null($trans) || $trans->user_id!=\Auth::id() || $result->status!=1 || $result->amount!=$trans->amount){
//            return redirect('/pay?error=error');
            $message="مشکلی در تراکنش شما به وجود آمده است، لطفا کمی بعد تلاش کنید.";
            return view('pay-error.pay-error')->with(['message'=>$message]);
//            return $result->errorMessage;
        }
        $res=$this->AdjustCredit($trans->amount/10000);
        if($res){
            $cardnumber = $_POST['cardNumber'];
            $trans=Transactions::findorfail($trans->id);
            $trans->type=$trans->type.'='.$cardnumber;
            $trans->condition=1;
            $trans->save();
            return  view('BuyOperations.credit-approval')->with(['transId'=>$transId,'finance'=>\Auth::user()->finance->amount+$trans->amount/10000,'amount'=>$trans->amount/10]);
        }
        else{
            $message="تراکنش با موفقیت انجام شد، ولی مشکلی به وجود آمده است ، با بخش پشتیبانی تماس بگیرید. | "." کد پیگیری تراکنش :$transId ";
            return view('pay-error.pay-error')->with(['message'=>$message]);
        }
    }

    /*
     *
     */
    public function update(){
        $user=\Auth::user();
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


    public function ChangePass()
    {
        $input=Input::all();
        if(!Input::has('oldpassword')|| !Input::has('password')){
            return redirect('/profile')->withErrors(['errors'=>'اطلاعات ارسالی کامل نیست']);
        }
        $user=\Auth::user();
        if(!password_verify(Input::get('oldpassword'),$user->password))
            return redirect('/profile')->withErrors(['errors'=>'رمز قدیم شما اشتباه است.']);
        $rules = array(
            'password' => 'required|min:6',
        );
        $messages=[
            'password.required'=>'رمز عبور ضروری میباشد ',
            'password.min'=>'حداقل طول پسورد ۶ است ',
        ];
        $validator = Validator::make($input, $rules,$messages);
        if($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $user->password=bcrypt(Input::get('password'));
        try{
            $user->save();
        }
        catch ( \Illuminate\Database\QueryException $e){
            return redirect('/profile')->withErrors(['errors'=>'. مشکلی در تغییر رمز  به وجود آمد مججدا تلاش بفرمایید']);
        }
        return redirect('/profile')->with(['success'=>'عملیات موفقیت آمیز بود.']);
    }

    /*
     * 
     */
    public function edit()
    {
        $input = Input::all();
        $user=\Auth::user();
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

    public function AdjustUserCredit(User $user,$payment)
    {
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

    public function invite(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'author' => 'required|max:40|min:3',
            'email' => 'required',
        ], [
            'author.min' => 'نام وارد شده باید بیشتر از 3 کاراکتر داشته باشد. ',
            'author.required' => 'شما حتما باید اسم را وارد کنید .',
            'email.required' => 'شما حتما باید ایمیل را وارد کنید .',

        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $user_id = \Auth::user()->id;
        $user_name = \Auth::user()->name;
        $email = $request->input('email');
        $name = $request->input('author');
        $subject = " کاربر $user_name شمارا به وستاکمپ دعوت کرده است ";

        $user = User::where('email', $email)->first();
        if (!is_null($user)) {
            return Redirect::back()->withErrors(['کاربری قبلا با این ایمیل ثبت نام کرده است .']);
        }

        $length = 10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $invite_code = $randomString;
        $invite=Invite::where('email',$email)->first();
        if(is_null($invite)){
            //save invite user in DB
            $invite = new Invite();
            $invite->name = $name;
            $invite->email = $email;
            $invite->invite_code = $invite_code;
            $invite->user_id = $user_id;

            try {
                $invite->save();
                //send invite mail
            } catch (\Illuminate\Database\QueryException $e) {
                return Redirect::back()->withErrors(['اشکال در سیستم:', 'خطایی در سرور پیش آمده است لطفا لحظاتی بعد مجددا تلاش بفرمایید.']);
            }
        }

        $data = array(
            'email' => $email,
            'subject' => $subject,
            'name' => $name,
            'username' => $user_name,
            'key' => $invite->invite_code
        );


        try {
            \Mail::send('invitemail', $data, function ($message) use ($data) {
                $message->from('vestacamp@vestaak.com');
                $message->to($data['email']);
                $message->subject($data['subject']);
            });
        } catch (Exception $e) {
            if (count(Mail::failures()) > 0) {
                return Redirect::back()->withErrors(['اشکال در سیستم:', 'خطایی در سرور پیش آمده است لطفا لحظاتی بعد مجددا تلاش بفرمایید.']);
            }
        } catch (\Swift_SwiftException $se) {
            return Redirect::back()->withErrors(['اشکال در سیستم:', 'خطایی در سرور پیش آمده است لطفا لحظاتی بعد مجددا تلاش بفرمایید.']);

        }

        return redirect('/profile')->with('success', 'عملیات ارسال دعوت نامه انجام شد.');


    }
}
