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
        $courses = Usecourse::paginate(3)->where('activated',1);
        $count_course = count(Usecourse::where('activated',1));
        $count_student =  count(User::where('activated',1));

        foreach ($courses as $course){
            $course['name'] = $course->course->name;
            $course['start_date'] = $course->start;
            $course['intro'] = $course->course->introduction;
            $course['price'] = $course->price;
            $course['start_time'] = $course->coursepart()->first()->start;
            if(is_null( $course->image))
                $course['image'] = "/pic/370x280-img-2.jpg";
            else
                $course['image'] = $course->image;

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
        foreach ($teachers as $teacher){
            if(is_null($teacher->image)){
                $teacher->image = "/pic/210x220-img-2.jpg";
                $teacher->save();
            }
        }
        return view('index')->with(['count_student'=>$count_student,'course_count'=>$count_course,'courses'=>$courses,'tags'=>$tags,'categories'=>$categories,'teachers'=>$teachers]);
    }
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($course)
    {
//        $course['teachers']="";
//        $counter=0;

        // Just to Loop over the teachers array to get the data
        $course->teachers()->get();

//        foreach ($course->teachers()->get() as $teacher){
//            if($counter)
//                $course['teachers']=$course['teachers'].",".$teacher->name;
//            else
//                $course['teachers']=$teacher->name;
//            $counter++;
//        }

        // Just to Loop over the exercises array to get the data
        $course->excercises()->get();


//        $course['excercises']="";
//        $counter=0;
//        foreach ($course->excercises()->get() as $excercise){
//            if($counter)
//                $course['excercises']=$course['excercises'].",".$excercise->name;
//            else
//                $course['excercises']=$excercise->name;
//            $counter++;
//        }

        $course['rate']=-1;
        $check=0;
        foreach ($course->reviews()->get() as $review){
            if($check==0){
                $course['rate']=0;
                $check=1;
            }
            $course['rate'] += $review->pivot->rate;
        }
        if($check==1)
            $course['rate'] = $course['rate']/count($course->reviews);
        $course['reviews_count'] = count($course->reviews);

        //$intro=$course->course()->sections()->where('part',0)->first();

        $intro=$course->course()->whereHas('sections', function ($q) {
            $q->where('part', 0);})->first()->introduction;

        $course['Durations']=0;
        $counter=0;
        $time=0;


//        return $course->course->sections;

        foreach($course->course->sections as $section){
            $counter++;
            $time+=$section->duration;
        }
        $course['duration']=$time;
        $course['sections_count']=$counter;
        $students = count($course->takers);
        $course['students_count']=$students;
        $course['category_name']=$course->course->category->name;
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

        return $course;
    }

    /**
     * @return user take that course
     */
    public function usertakecourse($course)
    {
        $users = $course->takers;
        return view('course.users', ['users' => $users]);

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
        if(\Auth::check())
        {
            $able=1;
        }
        else
            $able=0;

        return view('courses.course-review')->with(['Data'=>$reviews,'able'=>$able]);
    }

    #todo check search function
    /* Search in Courses */
    public function Search(Request $request)
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $input = Input::all();
        $input['search']=strtolower($input['search']);
        $input['search']=lcfirst($input['search']);
        $result=array();
        $list=array();
        $list[]=0;
        $courses = Course::whereHas('tags', function ($query)use($input) {
            $query->where('tag_name', 'like', $input['search']);
        })->get();
        foreach ($courses as $course) {
            // cannot use $course->teachers()->get(); because each have many usecourse ...
            $course['teachers'] = "";
            $counter = 0;
            foreach ($course->usecourse as $usecourse) {
                foreach ($usecourse->teachers as $teacher) {
                    if ($counter)
                        $course['teachers'] = $course['teachers'] . "," . $teacher->name;
                    else
                        $course['teachers'] = $teacher->name;
                    $counter++;
                }
            }
            $rate_value = -1;
            $check = 0;
            $rate_count = 0;
            foreach ($course->usecourse as $usecourse) {
                foreach ($usecourse->reviews as $review) {
                    if ($check == 0) {
                        $rate_value = 0;
                        $check = 1;
                    }
                    $rate_value += $review->pivot->rate;
                    $rate_count++;
                }
            }
            if ($check == 1)
                $rate_value = $rate_value / $rate_count;
            $course['rate_value']=$rate_value;
            $course['rate_count']=$rate_count;

            $count=0;
            $duration=0;
            foreach ($course->sections as $section){
                $count++;
                $duration+=$section->$duration;
            }
            $course['section_duration']=$duration;
            $course['section_count']=$count;
            $course['category']=$course->category->name;
            //???
            if(!in_array($course->id,$list)){
                $result[]=$course;
                $list[]=$course->id;
            }
        }

        $category_list=array();
        $category_number = 0;
        while (Input::has('category' . $category_number)) {
            $category_list[]=$input['category'.$category_number];
            $category_number++;
        }
        $tags=Tag::all();
        $categories=Category::all();
        if($category_number==0)
        {
            $total=count($result);
            $col =$result;
            $perPage = 10;
            $offset = ($currentPage * $perPage) - $perPage;
            $entries = new LengthAwarePaginator(array_slice($result, $offset, $perPage, true), count($col), $perPage, $currentPage,['path' => $request->url(), 'query' => $request->query()]);
            $entries->setPath('/Courses/Search');
            return view('courses.courses-list')->with(['entries'=>$entries,'course_count'=>$total,'search'=>'1','tags'=>$tags,'categories'=>$categories]);
        }
        else{
            $Data=array();
            foreach ($result as $item){
                if(in_array($item->category->name,$category_list)){
                    $Data[]=$item;
                }
            }
            $total=count($Data);
            $col =$Data;
            $perPage = 10;
            $offset = ($currentPage * $perPage) - $perPage;
            $entries = new LengthAwarePaginator(array_slice($Data, $offset, $perPage, true), count($col), $perPage, $currentPage,['path' => $request->url(), 'query' => $request->query()]);
            $entries->setPath('/Courses/Search');
            return view('courses.courses-list')->with(['entries'=>$entries,'course_count'=>$total,'search'=>'1','tags'=>$tags,'categories'=>$categories]);
        }
    }


//    public function ShowExcercises($course)
//    {
//        $excercises=$course->teachers;
//        foreach ($excercises as $excercise){
//            $excercise['part'] = $excercise->part;
//            $excercise['name'] = $excercise->name;
//            $excercise['description'] = $excercise->description;
//            $excercise['downloadfile'] = $excercise->downloadfile;
//            $excercise['deadline'] = $excercise->deadline;
//        }
//        return $excercises;
//    }


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
