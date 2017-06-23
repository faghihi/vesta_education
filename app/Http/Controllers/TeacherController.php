<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\User;
use App\Category;
use App\Course;
use App\Usecourse;
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

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Response
     */
    public function index()
    {
        $teachers = Teacher::paginate(8);
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
                $teacher['rate'] = $teacher['rate']/count($teacher->reviews);

            $teacher['reviews'] = count($teacher->reviews);
        }
        $categories = Category::all();
        return view('teachers.teachers-list')->with(['teacher_count'=>$count_teacher,'teachers'=>$teachers,'categories'=>$categories]);
    }
    /**
     * Display the specified resource.
     *
     * @return \Response
     */
    public function show($id)
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
        $teacher = Teacher::findorfail($id);
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
                $course['rate'] = $course['rate']/count($course->reviews);
            $course['reviews_count'] = count($course->reviews);
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
            $teacher['rate'] = $teacher['rate']/count($teacher->reviews);
        //teacher tags
        $fields = $teacher->fields;
//        foreach ($fields as $field){
//            $teacher['field_name']=$field->name;
//        }
        $courses = $teacher->courses()->get();
        $tags = $teacher->fields()->get();
        return view('teachers.teacher-single-item', ['teacher' => $teacher,'courses'=>$courses,'fields'=>$tags]);
    }

//    #todo check search teacher
//    public function Search()
//    {
//        $currentPage = LengthAwarePaginator::resolveCurrentPage();
//        $input = Input::all();
//        if(!isset($input['name'])){
//            return redirect('/instructors');
//        }
//        $teachers=Teacher::where('name','like','%'.$input['name'].'%')->get();
//        foreach ($teachers as $teacher){
//            $teacher['Course_count']=count($teacher->courses);
//
//            $teacher['rate_value']=-1;
//            $check=0;
//            foreach ($teacher->reviews as $review){
//                if($check==0){
//                    $teacher['rate_value']=0;
//                    $check=1;
//                }
//                $teacher['rate_value'] += $review->pivot->rate;
//            }
//            if($check==1)
//                $teacher['rate_value'] = $teacher['rate_value']/count($teacher->reviews);
//
//            $teacher['rate_count'] = count($teacher->reviews);
//        }
//        $total=count($teachers);
//        $col =$teachers;
//        $perPage = 10;
//        $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
//        $entries = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);
//        $entries->setPath('/instructor/Search');
//        return view('instructor.instructor-list')->with(['Data'=>$entries,'total'=>$total,'Search'=>'1']);
//    }

    #todo check search function
    /* Search in Courses */
    public function Search(Request $request)
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $input = Input::all();
        $input['search'] = strtolower($input['search']);
        $input['search'] = lcfirst($input['search']);
        $entries = collect();
        $col =$entries;
        $perPage = 9;
        $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $teachers = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);
        if (isset($input['category-id']) and $input['search']) {
            $category = Category::where('name', $input['category-id'])->first();
            $rs = Course::where('category_id', $category->id)->get();
            $cs = Course::whereHas('tags', function ($query) use ($input) {
                $query->where('tag_name', 'like', $input['search']);
            })->get();
            $courses = collect();
            foreach ($rs as $course) {
                foreach ($cs as $c) {
                    $temp = Usecourse::whereHas('course', function ($query) use ($c) {
                        $query->where('course_id', $c);
                    })->orwhereHas('course', function ($query) use ($course) {
                        $query->where('course_id', $course->id);
                    })->get();
                    $courses = $courses->merge($temp);
                }
            }
            foreach ($courses as $course){
                $temp = $course->teachers()->get();
                $entries = $entries->merge($temp);
                $col =$entries;
                $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
                $teachers = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);
            }
        } elseif ($input['search']) {
            $cs = Course::whereHas('tags', function ($query) use ($input) {
                $query->where('tag_name', 'like', $input['search']);
            })->get();
            $courses = collect();
            foreach ($cs as $c)
            {
                $temp = Usecourse::whereHas('course', function ($query) use ($c) {
                    $query->where('course_id', $c->id);
                })->get();
                $courses = $courses->merge($temp);
            }
            foreach ($courses as $course){
                $temp = $course->teachers()->get();
                $entries = $entries->merge($temp);
                $col =$entries;
                $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
                $teachers = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);
            }
        } else {
            $category = Category::where('name', $input['category-id'])->first();
            $cs = Course::where('category_id', $category->id)->get();
            $courses = collect();
            foreach ($cs as $course) {
                $temp = Usecourse::whereHas('course', function ($query) use ($course) {
                    $query->where('course_id', $course->id);
                })->get();
                $courses = $courses->merge($temp);
            }
            foreach ($courses as $course){
                $temp = $course->teachers()->get();
                $entries = $entries->merge($temp);
                $col =$entries;
                $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
                $teachers = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);
            }
        }

        $categories = Category::all();
        return view('teachers.teachers-list')->with(['teacher_count'=>count($teachers),'teachers'=>$teachers,'categories'=>$categories]);
    }
}
