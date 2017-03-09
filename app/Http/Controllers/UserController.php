<?php

namespace App\Http\Controllers;

use App\Package;
use App\Usecourse;
use App\User;
use App\Course;
use App\Discount;
use App\Finance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Relations;
use Illuminate\Contracts\Database;
use Illuminate\Validation;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent;
use Illuminate\Session;
use Validator;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use File;


class UserController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $rules = [
            'Image'      => 'max:100000|mimes:jpeg,JPEG,PNG,png',
        ];
        $messages = [
            'image.max'         =>'حجم فایل بسیار زیاد است ',
            'image.mimes'       =>'فرمت فایل شما ساپورت نمیشود.',
        ];
        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()) {
            return Redirect::to('test2')
                ->withErrors($validator);
               // ->withInput(Input::expect('password'));
        } else {
            if(Input::hasFile('Image')){
                if (Input::file('Image')->isValid()) {
                    $user=\Auth::user();
                    $destinationPath = 'uploads'; // upload path
                    $extension = Input::file('Image')->getClientOriginalExtension(); // getting image extension
                    $fileName = rand(11111,99999).'.'.$extension; // renameing image
                    Input::file('Image')->move($destinationPath, $fileName); // uploading file to given path
                    $user->image=$destinationPath.'/'.$fileName;
                    try{
                        $user->save();
                    }
                    catch ( \Illuminate\Database\QueryException $e){
                        return redirect('/test?error=error');
                    }
                    return redirect('/test?success=1');
                }
                else {
                    return redirect('/test?error=error');
                }
            }

            // redirect
            //active your profile
            return Redirect::to('test.activiation');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('user.edit', ['user' => User::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'Name'       => 'required|Min:3|Max:80',
            'Email'      => 'required|Between:3,64|Email',
            'Mobile'     => 'required|Min:11|Max:12'
        );
        $messages = [
            'Name.required'        => 'وارد کردن نام شما ضروری است ',
            'Email.required'       => 'وارد کردن ایمیل شما ضروری است ',
            'Mobile.required'      => 'وارد کردن موبایل  شما ضروری است ',
            'Name.min'             => 'نام کامل خود را وارد نمایید ( حداقل 3 کاراکتر) ',
            'Email.email'          => 'ایمیل معتبر نیست',
            'Mobile.min'           => 'شماره وارد شده نامعتبر است.'
        ];
        $validator = Validator::make(Input::all(), $rules, $messages);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('users/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $user = User::find($id);
            $user->name       = Input::get('Name');
            $user->email      = Input::get('Email');
            $user->mobile     = Input::get('Mobile');
            $user->save();

            // redirect
            Session::flash('message', 'با موفقیت تغییرات اعمال گردید.');
            return Redirect::to('users');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $user = User::find($id);
        $user->delete();

        // redirect
        Session::flash('message', 'با موفقیت حذف گردید.');
        return Redirect::to('users');
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
     * @return id course
     */
    public function gettakecourse($id)
    {
        $course_id = $id;
        $this->settakecourse($course_id);
        /*
         * option2 :return course_id;
         */
        //return view('user.takecourse', ['courseid' => $course_id]);
    }
    /**
     * set a course of a user
     */
    public function settakecourse($course_id)
    {
        $rules = array(
            'Name'       => 'required|Min:3|Max:80',
            'FName'      => 'required|Min:3|Max:80',
            'Email'      => 'required|Between:3,64|Email',
            'Mobile'     => 'required|Min:11|Max:12',
            'Code'       => ''
        );
        $messages = [
            'Name.required'        => 'وارد کردن نام شما ضروری است ',
            'FName.required'       => 'وارد کردن نام خنوادگی شما ضروری است ',
            'Email.required'       => 'وارد کردن ایمیل شما ضروری است ',
            'Mobile.required'      => 'وارد کردن موبایل  شما ضروری است ',
            'Name.min'             => 'نام کامل خود را وارد نمایید ( حداقل 3 کاراکتر) ',
            'Email.email'          => 'ایمیل معتبر نیست',
            'Mobile.min'           => 'شماره وارد شده نامعتبر است.',
            'Code'                 => ''
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
                $user->courses()->attach(dd($course_id));

                $this->creditpay($user->id);
                $this->AdjustCredit($user->id);
            }
            else{
                $user = User::where(['email',Input::get('Email')])->first();
                $user->courses()->attach(dd($course_id), [['paid' => '0'],['discount_used' => '0']]);
            }
            $price = Usecourse::find($course_id)->price;
            $code  = Input::get('Code');
            if($code) {
                $discount = Discount::where('code', $code)->first();
                if (is_null($discount)) {
                    $response['error'] = 1; // not such a code in valid
                    $response['price'] = $price;
                    return $response;
                } else {
                    if ($discount->count <= 0) {
                        $response['error'] = 2; // not available as it is expired
                        $response['price'] = $price;
                        return $response;
                    } else {
                        $response['error'] = 0; // there is no error
                        if ($discount->type == 0) {
                            $newprice = $price * $discount->value / 100;
                        } else {
                            $newprice = $price - $discount->value;
                        }
                        $response['price'] = $newprice;
                        return $response;
                    }
                }
            }
            // redirect
            return Redirect::to('users.pay');
        }
    }

    /**
     * @param $course_id , $user_id
     * user pay wit credit
     * @return string
     */
    public function creditpay($payment)
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
    /**
     * @return $pack_id
     */
    public function gettakepack($id)
    {
        $pack_id = $id;
        $this->settakepack($pack_id);
        /*
         * option2 :return course_id;
         */
        //return view('user.takecourse', ['courseid' => $course_id]);
    }
    /**
     * set a course of a user
     */
    public function settakepack($pack_id)
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
                $user->packages()->attach(dd($pack_id), [['paid' => '0'],['discount_used' => '0']]);
            }
            // redirect
            return Redirect::to('users.pay');
        }
    }
    /**
     * @param $pack_id , $user_id
     * user pay for
     * @return string
     */
    public function userpaypack($pack_id,$user_id)
    {
        $price = Package::find($pack_id)->price;
        $code  = Input::get('Code');
        if($code) {
            $discount = Discount::where('code', $code)->first();
            if (is_null($discount)) {
                $response['error'] = 1; // not such a code in valid
                $response['price'] = $price;
                return $response;
            } else {
                if ($discount->count <= 0) {
                    $response['error'] = 2; // not available as it is expired
                    $response['price'] = $price;
                    return $response;
                } else {
                    $response['error'] = 0; // there is no error
                    if ($discount->type == 0) {
                        $newprice = $price * $discount->value / 100;
                    } else {
                        $newprice = $price - $discount->value;
                    }
                    $response['price'] = $newprice;
                    return $response;
                }
            }
        }
    }
    /**
     * @param get teacher id whose review
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
                if(!Input::get('Rate')){
                    $user->teacherreviews()->save($teacher_id, [['comment' => Input::get('Comment')],['rate' => Input::get('Rate')],['enable' => '0']]);
                }
                else{
                    $user->teacherreviews()->save($teacher_id, [['comment' => Input::get('Comment')],['enable' => '0']]);
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
                if(!Input::get('Rate')){
                    $user->coursereviews()->save($course_id, [['comment' => Input::get('Comment')],['rate' => Input::get('Rate')],['enable' => '0']]);
                }
                else{
                    $user->coursereviews()->save($course_id, [['comment' => Input::get('Comment')],['enable' => '0']]);
                }
            }
            // redirect
            return Redirect::to('users');
        }
    }
    /**
     * return favourites
     */
    public function favourites($id)
    {
        $user = User::findOrFail($id);
        $favourites =  $user->favourites()->get();
        return view('user.favourites', ['favourites' => $favourites]);
    }
}
