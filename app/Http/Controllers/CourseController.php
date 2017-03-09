<?php

namespace App\Http\Controllers;

use App\Course;
use App\Usecourse;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Relations;
use Illuminate\Contracts\Database;
use Illuminate\Validation;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Validator;



class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Usecourse::all();
        $duration = Course->sections()::all();
        //Adding Use Course Duration From its Sections

        // load the view and pass the users
        return view('course', ['courses' => $courses]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Add Teachers , Sections , Rates , Reviews

        return view('course.info', ['course' => Course::findOrFail($id)]);
    }

    /**
     * @return all user take that course
     */
    public function usertakecourse($id)
    {
        $course = Usecourse::find($id);

        // what condition ?????????????????????
        $users = $course->takers->get();

        return view('course.users', ['users' => $users]);

        #TODO test this functioning
    }

    /**
     * @return string
     */
    public function teacher($id)
    {
        
    }
    
}
