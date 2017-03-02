<?php

namespace App\Http\Controllers;

use App\Course;
use App\Usecourse;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Relations;
use Illuminate\Contracts\Database;
use Illuminate\Validation;
use Illuminate\Support\Facades\Redirect;

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
        // load the view and pass the users
        return view('course', ['courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // load the create form (app/views/users/create.blade.php)
        return view('courses.create');
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
            'Name'                     => 'required|Min:3|Max:80',
            'Level'                    => '',
            'Introvideo'               => '',
            'Introduction'             => '',
            'Goal'                     => '',
            'Requierment'              => '',
            'Qualification'            => '',
            'Category'                 => 'required',
            'Image'                    => '',
            'Start'                    => '',
            'Price'                    => ''
        );
        $messages = [
            'Name.required'            => 'وارد کردن نام شما ضروری است ',
            'Name.min'                 => 'نام کامل خود را وارد نمایید ( حداقل 3 کاراکتر) ',
            'Level'                    => '',
            'Introvideo'               => '',
            'Introduction'             => '',
            'Goal'                     => '',
            'Requierment'              => '',
            'Qualification'            => '',
            'Category.required'        => 'وارد کردن نام دسته بندی شما ضروری است',
            'Image'                    => '',
            'Start'                    => '',
            'Price'                    => ''
        ];
        $validator = Validator::make(Input::all(), $rules,$messages);
        if ($validator->fails()) {
            return Redirect::to('courses/create')
                ->withErrors($validator);
        } else {
            // store
            $course = new Course;
            $course->name               = Input::get('Name');
            if(Input::get('Level'))
                $course->level          = Input::get('Level');
            if(Input::get('Introvideo'))
                $course->introvideo     = Input::get('Introvideo');
            if(Input::get('Introduction'))
                $course->introduction   = Input::get('Introduction');
            if(Input::get('Goal'))
                $course->goal           = Input::get('Goal');
            if(Input::get('Requierment'))
                $course->requirement    = Input::get('Requierment');
            if(Input::get('Qualification'))
                $course->qualification  = Input::get('Qualification');
            $category = Category::where(['email',Input::get('Email')])->first();
            if($category)
                $course->category()->associate($category->id);
            else{
                $category = new Category;
                $category->name         = Input::get('Category');
                $category->save();
                $course->category()->associate($category->id);
            }
            $usecourse = new Usecourse;
            $usecourse->image      = Input::get('Image');
            $usecourse->start      = Input::get('Start');
            $usecourse->price      = Input::get('Price');
            $usecourse->save();

            $usecourse->course()->associate(Course::find($course->id));

            // redirect
            Session::flash('message', 'درس با موفقیت ثبت شد.');
            return Redirect::to('courses');
        }
    }
    
}
