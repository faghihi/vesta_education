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
            if(Input::get('Category')) {
                $category = Category::where(['name', Input::get('Category')])->first();
                if ($category)
                    $course->category()->associate($category);
                else {
                    $category = new Category;
                    $category->name = Input::get('Category');
                    $category->save();
                    $course->category()->associate($category);
                }
            }
            $course->save();
            $usecourse = new Usecourse;
            if(Input::get('Image'))
                $usecourse->image      = Input::get('Image');
            if(Input::get('Start'))
                $usecourse->start      = Input::get('Start');
            if(Input::get('Price'))
                $usecourse->price      = Input::get('Price');
            $usecourse->save();

            $usecourse->course()->associate($course);

            $usecourse->save();

            // redirect
            Session::flash('message', 'درس با موفقیت ثبت شد.');
            return Redirect::to('courses');
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
        return view('course.info', ['course' => Course::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('course.edit', ['course' => Course::findOrFail($id)]);
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
            return Redirect::to('courses/update')
                ->withErrors($validator);
        } else {
            // edit
            $usecourse = Usecourse::find($id);
            if(Input::get('Image'))
                $usecourse->image      = Input::get('Image');
            if(Input::get('Start'))
                $usecourse->start      = Input::get('Start');
            if(Input::get('Price'))
                $usecourse->price      = Input::get('Price');
            $usecourse->save();

            $course = Course::find($usecourse->course_id);
            if(Input::get('Name'))
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
            if(Input::get('Category')) {
                $category = Category::where(['name', Input::get('Category')])->first();
                if ($category)
                    $course->category()->associate($category);
                else {
                    $category = new Category;
                    $category->name = Input::get('Category');
                    $category->save();
                }
            }
            $course->save();

            // redirect
            Session::flash('message', 'درس با موفقیت تغییر یافت.');
            return Redirect::to('courses');
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
        $course = Course::find($id);
        $course->delete();

        // redirect
        Session::flash('message', 'با موفقیت حذف گردید.');
        return Redirect::to('courses');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * @return all user take that course
     */
    public function usertakecourse($id)
    {
        $course = Usecourse::find($id);

        // what condition ?????????????????????
        $users = $course->takers()->where(['paid', '1'])->get();

        return view('course.users', ['users' => $users]);
    }

    /**
     * @return string
     */
    public function setcoursepack()
    {
        return $this->validatesRequestErrorBag;
    }
    
}
