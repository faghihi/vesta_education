<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Relations;
use Illuminate\Contracts\Database;
use Illuminate\Validation;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Validator;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $teachers = Teacher::all();
        // load the view and pass the users
        return view('teachers', ['teachers' => $teachers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // load the create form (app/views/users/create.blade.php)
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $rules = array(
            'Name'                     => 'required|Min:3|Max:80',
            'Image'                    => '',
            'Resume_link'              => '',
            'Occupation'               => '',
            'Introduction'             => '',
            'Work_experimence'         => '',
            'Phone'                    => '',
            'Email'                    => 'required',
            'Education'                => '',
        );
        $messages = [
            'Name.required'            => 'وارد کردن نام شما ضروری است ',
            'Name.min'                 => 'نام کامل خود را وارد نمایید ( حداقل 3 کاراکتر) ',
            'Email.required'           => 'وارد کردن ایمیل شما ضروری است',
            'Phone.required'           => 'وارد کردن موبایل شما ضروری است',
            'Resume_link'              => '',
            'Occupation'               => '',
            'Introduction'             => '',
            'Work_experimence'         => '',
            'Phone'                    => '',
            'Email'                    => '',
            'Education'                => '',
        ];
        $validator = Validator::make(Input::all(), $rules,$messages);
        if ($validator->fails()) {
            return Redirect::to('teachers/create')
                ->withErrors($validator);
        } else {
            // store
            $teacher = new Teacher;
            $teacher->name               = Input::get('Name');
            if(Input::get('Email'))
                $teacher->level          = Input::get('Email');
            if(Input::get('Phone'))
                $teacher->introvideo     = Input::get('Phone');
            if(Input::get('Image'))
                $teacher->introvideo     = Input::get('Image');
            if(Input::get('Resume_link'))
                $teacher->introduction   = Input::get('Resume_link');
            if(Input::get('Occupation'))
                $teacher->goal           = Input::get('Occupation');
            if(Input::get('Introduction'))
                $teacher->requirement    = Input::get('Introduction');
            if(Input::get('Qualification'))
                $teacher->qualification  = Input::get('Qualification');
            if(Input::get('Work_experimence'))
                $teacher->qualification  = Input::get('Qualification');
            $teacher->save();

            // redirect
            return Redirect::to('teachers');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return view('teacher.info', ['teacher' => Teacher::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


}
