<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\User;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades;
//use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Relations;
use Illuminate\Contracts\Database;
use Illuminate\Validation;
use Illuminate\Database\Eloquent;
//use Illuminate\Support\Facades\Redirect;
//use Illuminate\Validation\Validator;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Response
     */
    public function index()
    {
        $teachers = Teacher::paginate(10);
        $count_teacher=count(Teacher::all());
        foreach ($teachers as $teacher){
            $teacher['rate']=-1;
            $check=0;
            foreach ($teacher->reviews as $review){
                if($check==0){
                    $teacher['rate']=0;
                    $check=1;
                }
                $teacher['rate'] += $review->pivot->rate;
            }
            if($check==1)
                $teacher['rate'] = $teacher['rate']/count($teacher->reviews());

            $teacher['reviews'] = count($teacher->reviews());
        }
        return view('teachers.teachers-list')->with(['teacher_count'=>$count_teacher,'teachers'=>$teachers]);
    }
    /**
     * Display the specified resource.
     *
     * @return \Response
     */
    public function show($teacher)
    {
        // Add the courses of teacher and reviews and teacher_tag
        //teacher
//        $teacher['name'] = $teacher->name;
//        $teacher['image'] = $teacher->image;
//        $teacher['resume_link'] = $teacher->resume_link;
//        $teacher['occupation'] = $teacher->occupation;
//        $teacher['introduction'] = $teacher->work_experimence;
//        $teacher['phone'] = $teacher->phone;
//        $teacher['email'] = $teacher->email;
//        $teacher['education'] = $teacher->education;

        //reviews
        $reviews=$teacher->reviews()->wherePivot('enable',1)->get();
        foreach ($reviews as $review){
            $user=User::findorfail($review->pivot->user_id);
            $teacher['user_name']=$user->name;
            $teacher['user_image']=$user->image;
            $teacher['user_comment']=$user->comment;
        }
        //courses
        $courses = $teacher->courses;
        foreach ($courses as $course){
            $course['name'] = $course->course->name;
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
                $course['rate'] = $course['rate']/count($course->reviews());
            $course['reviews_count'] = count($course->reviews());
            $course['category_name']=$course->course->category->name;
        }
        $teacher['Courses']=$courses;

        //rate
        $teacher['rate']=-1;
        $check=0;
        foreach ($teacher->reviews as $review){
            if($check==0){
                $teacher['rate']=0;
                $check=1;
            }
            $teacher['rate'] += $review->pivot->rate;
        }
        if($check==1)
            $teacher['rate'] = $teacher['rate']/count($teacher->reviews());
        //teacher tags
        $fields = $teacher->fields;
//        foreach ($fields as $field){
//            $teacher['field_name']=$field->name;
//        }
        return view('teacher.info', ['teacher' => $teacher]);
    }
    
}
