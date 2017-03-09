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
use Laravel\Socialite\Facades\Socialite;
use Validator;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use File;


class UserController extends Controller
{

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
                $user=User::find($user->id);
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
                $user=User::find($user->id);
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
    public function favourites($user)
    {
        $favourites =  $user->favourites;
        return $favourites;
    }
}
