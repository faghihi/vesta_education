<?php

namespace App\Http\Controllers;

use App\Teacher;
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

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
//          $teachers = Teacher::all();
//
//       load the view and pass the users
//        return view('teachers', ['teachers' => $teachers]);

        //Adding Use Course Duration From its Sections
        $teachers = Teacher::paginate(10);
        $count_teacher=count(Teacher::all());
        foreach ($teachers as $teacher){
            $teacher['name'] = $teacher->name;
            $teacher['image'] = $teacher->image;
            $teacher['rate']=0;
            foreach ($teacher->reviews as $review){
                $teacher['rate'] += $review->pivot->rate;
            }
            $course['rate'] = $teacher['rate']/count($teacher->reviews());
            $course['reviews'] = count($course->reviews());
        }
        return view('teachers.teachers-list')->with(['teacher_count'=>$count_teacher,'teachers'=>$teachers]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($teacher)
    {
        // Add the courses of teacher and reviews and teacher_tag
        //
        $reviews=$teacher->reviews()->wherePivot('enable',1)->get();
        foreach ($reviews as $review){
            $user=User::findorfail($review->pivot->user_id);
            $review['user_name']=$user->name;
            $review['user_image']=$user->image;
            $review['user_comment']=$user->comment;
        }
        $courses = $teacher->courses();
        return $courses;
        
        //return view('teacher.info', ['teacher' => Teacher::findOrFail($id)]);
    }


}
