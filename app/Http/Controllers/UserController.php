<?php

namespace App\Http\Controllers;

use App\User;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Relations;
use Illuminate\Contracts\Database;
use Illuminate\Validation;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        // load the view and pass the users
        return view('user', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // load the create form (app/views/users/create.blade.php)
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $rules = array(
            'Name'       => 'required|Min:3|Max:80',
            'Email'      => 'required|Between:3,64|Email',
            'Mobile'     => 'required|Min:11|Max:12'
        );
        $messages = [
            'Name.required'     => 'وارد کردن نام شما ضروری است ',
            'Email.required'    => 'وارد کردن ایمیل شما ضروری است ',
            'Mobile.required'   => 'وارد کردن موبایل  شما ضروری است ',
            'Name.min'          => 'نام کامل خود را وارد نمایید ( حداقل 3 کاراکتر) ',
            'Email.email'       => 'ایمیل معتبر نیست',
            'Mobile.min'        => 'شماره وارد شده نامعتبر است.'
        ];
        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()) {
            return Redirect::to('users/create')
                ->withErrors($validator)
                ->withInput(Input::expect('password'));
        } else {
            // store
            $user = new User;
            $user->name       = Input::get('Name');
            $user->email      = Input::get('Email');
            $user->mobile     = Input::get('Mobile');
            $user->save();

            // redirect
            Session::flash('message', 'کاربر با موفقیت ثبت شد.');
            return Redirect::to('users');
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
                $user->courses()->attach(dd($course_id));
            }
            else{
                $user = User::where(['email',Input::get('Email')])->first();
                $user->courses()->attach(dd($course_id));
            }
            // redirect
            Session::flash('message', 'ثبت درس شما با موفقیت صورت گرفت.');
            return Redirect::to('users');
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
                $user->packages()->attach(dd($pack_id));
            }
            // redirect
            Session::flash('message', 'ثبت بسته شما با موفقیت صورت گرفت.');
            return Redirect::to('users');
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
                    $user->teacherreviews()->save($teacher_id, [['comment' => Input::get('Comment')],['rate' => Input::get('Rate')]]);
                }
                else{
                    $user->teacherreviews()->save($teacher_id, ['comment' => Input::get('Comment')]);
                }
            }
            // redirect
            Session::flash('message', 'ثبت نظر شما با موفقیت صورت گرفت.');
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
                    $user->coursereviews()->save($course_id, [['comment' => Input::get('Comment')],['rate' => Input::get('Rate')]]);
                }
                else{
                    $user->coursereviews()->save($course_id, ['comment' => Input::get('Comment')]);
                }
            }
            // redirect
            Session::flash('message', 'ثبت نظر شما با موفقیت صورت گرفت.');
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
