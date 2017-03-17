<?php

namespace App\Http\Controllers;

use App\Course;
use App\Teacher;
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
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function index()
    {

        $courses = Usecourse::paginate(6)->where('activated',1);
        $count_course = count(Usecourse::where('activated',1));
        $count_student =  count(User::where('activated',1));
        $recent_courses  = Usecourse::orderBy('created_at', 'desc')->paginate(6)->where('activated',1);
        foreach ($recent_courses as $course){
            $course['name'] = $course->course->name;
            if(is_null($course->coursepart())){
                $course['start_time']="سا عت 12:00";
            }
            else {
                $course['start_time'] = $course->coursepart()->first()->start;
            }
            // No Need For teachers Yet in index page
//            $counter=0;
//            foreach ($course->teachers as $teacher){
//                if($counter)
//                    $course['teachers']=$course['teachers'].",".$teacher->name;
//                else
//                    $course['teachers']=$teacher->name;
//                $counter++;
//            }
            $course['Durations']=0;
            $counter=0;
            $time=0;
            foreach ($course->course->sections as $section){
                $counter++;
                $time+=$section->time;
            }
            $course['duration']=$time;
            $course['sections_count']=$counter;
            $course['rate']=-1;
            $check=0;
            foreach ($course->reviews as $review){
                if($check==0){
                    $course['rate']=0;
                    $check=1;
                }
                $course['rate'] += $review->pivot->rate;
            }
            if($check==1)
                $course['rate'] = $course['rate']/count($course->reviews);
            $course['reviews_count'] = count($course->reviews);
            $course['category_name']=$course->course->category->name;
        }
        $tags = Tag::all();
        $categories=Category::all();
        $teachers = Teacher::all();
        return view('index')->with(['count_student'=>$count_student,'course_count'=>$count_course,'courses'=>$courses,'recent_courses'=>$recent_courses,'tags'=>$tags,'categories'=>$categories,'teachers'=>$teachers]);
    }
}
