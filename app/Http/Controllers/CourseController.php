<?php

namespace App\Http\Controllers;

//use App\Course;
use App\Usecourse;
use App\Category;
use App\Tag;
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
        $courses = Usecourse::paginate(10);
        $count_course=count(Usecourse::all());
        foreach ($courses as $course){
            $course['name'] = $course->course->name;
            $course['image'] = $course->image;
            $course['online'] = $course->online;
            $counter=0;
            foreach ($course->teachers as $teacher){
                if($counter)
                    $course['teachers']=$course['teachers'].",".$teacher->name;
                else
                    $course['teachers']=$teacher->name;
                $counter++;
            }
            $course['Durations']="";
            $counter=0;
            $time=0;
            foreach ($course->course->sections as $section){
                $counter++;
                $time+=$section->time;
            }
            $course['duration']=$time;
            $course['sections']=$counter;
            $course['rate']=0;
            foreach ($course->reviews as $review){
                $course['rate'] += $review->pivot->rate;
            }
            $course['rate'] = $course['rate']/count($course->reviews());
            $course['reviews'] = count($course->reviews());
            $course['category']=$course->course->category->name;
        }
        $tags = Tag::all();
        $categories=Category::all();
        return view('courses.courses-list')->with(['course_count'=>$count_course,'courses'=>$courses,'tags'=>$tags,'Categories'=>$categories]);
    }
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($course)
    {
        $course['teachers']="";
        $counter=0;
        foreach ($course->teachers()->get() as $teacher){
            if($counter)
                $course['teachers']=$course['teachers'].",".$teacher->name;
            else
                $course['teachers']=$teacher->name;
            $counter++;
        }
        $course['excercises']="";
        $counter=0;
        foreach ($course->excercises()->get() as $excercise){
            if($counter)
                $course['excercises']=$course['excercises'].",".$excercise->name;
            else
                $course['excercises']=$excercise->name;
            $counter++;
        }
        $course['rate']=0;
        foreach ($course->reviews()->get() as $review){
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
//        return $course->course->sections;
        foreach($course->course->sections as $section){
            $counter++;
            $time+=$section->duration;
        }
        $course['duration']=$time;
        $course['sections']=$counter;
        $students = count($course->takers);
        $course['students']=$students;
        $course['category']=$course->course->category->name;
        $reviewss=$course->reviews()->wherePivot('enable',1)->get();
        $r_count=0;
        $reviews=array();
        while($r_count<5 && $r_count < count($reviewss))
        {
            $reviews[]=$reviewss[$r_count];
            $r_count++;
        }
        foreach ($reviews as $review){
            $user=User::findorfail($review->pivot->user_id);
            $review['user_name']=$user->name;
            $review['user_image']=$user->image;
            $review['user_comment']=$user->comment;

        }
        $course['Reviews']=$reviews;
        $course['online'] =$course->online;
        
        return $course;
    }

    /**
     * @return user take that course
     */
    public function usertakecourse($course)
    {
        $users = $course->takers;
        return view('course.users', ['users' => $users]);

        #TODO test this functioning
    }

    public function ShowReviews($course)
    {
        $reviews=$course->reviews()->wherePivot('enable',1)->get();
        foreach ($reviews as $review){
            $user=User::findorfail($review->pivot->user_id);
            $review['user_name']=$user->name;
            $review['user_image']=$user->image;
            $review['user_comment']=$user->comment;
        }
        return $reviews;
    }
    public function PassReviews($course)
    {
        $Data=$this->ShowReviews($course);
        $course['teachers']="";
        $counter=0;
        foreach ($course->teachers as $teacher){
            if($counter)
                $course['teachers']=$course['teachers'].",".$teacher->name;
            else
                $course['teachers']=$teacher->name;
            $counter++;
        }
        $course['Durations']="";
        $counter=0;
        $time=0;
        foreach ($course->course->sections as $section){
            $counter++;
            $time+=$section->time;
        }
        $course['duration']=$time;
        $course['sections']=$counter;
        $course['rate']=0;
        foreach ($course->reviews as $review){
            $course['rate'] += $review->pivot->rate;
        }
        $course['rate'] = $course['rate']/count($course->reviews());
        $course['reviews'] = count($course->reviews());

        if(\Auth::check())
        {
            $able=1;
        }
        else
            $able=0;
        return view('courses.course-review')->with(['Data'=>$Data,'course'=>$course,'able'=>$able]);
    }
    public function ShowExcercises($course)
    {
        $excercises=$course->teachers;
        foreach ($excercises as $excercise){
            $excercise['part'] = $excercise->part;
            $excercise['name'] = $excercise->name;
            $excercise['description'] = $excercise->description;
            $excercise['downloadfile'] = $excercise->downloadfile;
            $excercise['deadline'] = $excercise->deadline;
        }
        return $excercises;
    }
//    public function ShowTeachers($course)
//    {
//        $teachers=$course->teachers()->get();
//        foreach ($teachers as $teacher){
//            $teacher['name'] = $teacher->name;
//            $teacher['image'] = $teacher->image;
//            $teacher['resume_link'] = $teacher->resume_link;
//            $teacher['occupation'] = $teacher->occupation;
//            $teacher['introduction'] = $teacher->work_experimence;
//            $teacher['phone'] = $teacher->phone;
//            $teacher['email'] = $teacher->email;
//            $teacher['education'] = $teacher->education;
//        }
//        return $teachers;
//    }
}
