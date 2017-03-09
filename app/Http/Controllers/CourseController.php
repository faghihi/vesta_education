<?php

namespace App\Http\Controllers;

use App\Course;
use App\Usecourse;
use App\Category;
use App\Tag;
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
     * Display a listing of the courses with teachers , rate , number of reviews , durations , number of section , category .
     *
     * @return $courses;
     */
    public function index()
    {
        //Adding Use Course Duration From its Sections
        $courses = Course::paginate(10);
        $count_course=count(Course::all());
        foreach ($courses as $course){
            $course['Teachers']="";
            $counter=0;
            foreach ($course->teachers() as $teacher){
                if($counter)
                    $course['Teachers']=$course['Teachers'].",".$teacher->name;
                else
                    $course['Teachers']=$teacher->name;
                $counter++;
            }
            $course['Durations']="";
            $counter=0;
            $time=0;
            foreach ($course->course()->sections() as $section){
                $counter++;
                $time+=$section->time;
            }
            $course['duration']=$time;
            $course['sections']=$counter;
            $course['rate']=0;
            foreach ($course->reviews() as $review){
                $course['rate'] += $review->pivot->rate;
            }
            $course['rate'] = $course['rate']/count($course->reviews());
            $course['reviews'] = count($course->reviews());
            $course['category']->course()->category()->name;
        }
        $tags=Tag::all();
        $categories=Category::all();
        return view('courses.courses-list')->with(['course_count'=>$count_course,'courses'=>$courses,'tags'=>$tags,'Categories'=>$categories]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Usecourse $course)
    {
        $course['Teachers']="";
        $counter=0;
        foreach ($course->teachers() as $teacher){
            if($counter)
                $course['Teachers']=$course['Teachers'].",".$teacher->name;
            else
                $course['Teachers']=$teacher->name;
            $counter++;
        }
        $course['rate']=0;
        foreach ($course->reviews() as $review){
            $course['rate'] += $review->pivot->rate;
        }
        $course['rate'] = $course['rate']/count($course->reviews());
        $course['reviews'] = count($course->reviews());
        //$intro=$course->course()->sections()->where('part',0)->first();
        $intro=$course->course()->whereHas('sections', function ($q) {
            $q->where('part', 0);})->first();
        if(is_null($intro)){
            $course['intro']="nothing";
        }
        else {
            $course['intro']=$intro;
        }
        $course['Durations']="";
        $counter=0;
        $time=0;
        $course->id = 1;
        foreach($course->course()->sections() as $section){
            $counter++;
            $time+=$section->time;
        }
        $course['duration']=$time;
        $course['sections']=$counter;
        $students = count($course->takers());
        $course['students']=$students;
        $course['category']->course()->category()->name;
        $reviewss=$course->reviews()->wherePivot('enable',1);
        $r_count=0;
        $reviews=array();
        while($r_count<5 && $r_count < count($reviewss))
        {
            $reviews[]=$reviewss[$r_count];
            $r_count++;
        }
        foreach ($reviews as $review){
            $user=User::findorfail($review->user_id);
            $review['user_name']=$user->name;
            $review['user_image']=$user->image;
        }
        $course['Reviews']=$reviews;
        $id=["$course->id"];

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
