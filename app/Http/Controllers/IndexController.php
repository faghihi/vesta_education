<?php

namespace App\Http\Controllers;

use App\Course;
use App\Teacher;
use App\Usecourse;
use App\Category;
use App\Tag;
use App\User;
use App\Package;
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

        $courses = Usecourse::where('activated',1);
        $count_course = count(Usecourse::all()->where('activated',1));
        $count_pack = count(Package::all());
        $count_teacher = count(Teacher::all());
        $count_student =  count(User::where('activated',1));
        $recent_courses  = Usecourse::orderBy('created_at', 'desc')->paginate(3)->where('activated',1);
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
        return view('index')->with(['count_student'=>$count_student,'count_course'=>$count_course,'count_teacher'=>$count_teacher,'count_pack'=>$count_pack,'courses'=>$courses,'recent_courses'=>$recent_courses,'tags'=>$tags,'categories'=>$categories,'teachers'=>$teachers]);
    }

    public function search()
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $input = Input::all();
        if (isset($input['search']) && $input['search']) {
            $input['search'] = strtolower($input['search']);
            $input['search'] = lcfirst($input['search']);
            $entries = collect();
            $col =$entries;
            $perPage = 6;
            $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
            $courses = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);
            $cs = Course::whereHas('tags', function ($query) use ($input) {
                $query->where('tag_name', 'like', $input['search']);
            })->get();
            $entries = collect();
            foreach ($cs as $c)
            {
                $temp = Usecourse::whereHas('course', function ($query) use ($c) {
                    $query->where('course_id', $c->id);
                })->get();
                $entries = $entries->merge($temp);
                $col =$entries;

                $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
                $courses = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);

            }
        } else{
            $courses = Usecourse::paginate(6);
        }

//        $courses = Usecourse::whereHas('course', function ($query) use ($course) {
//            $query->where('course_id', $course->id);
//        });

//        $result = array();
//        $list = array();
//        $list[] = 0;
//        $courses = Course::whereHas('tags', function ($query) use ($input) {
//            $query->where('tag_name', 'like', $input['search']);
//        })->get();
        $categories = Category::all();
        foreach ($courses as $course) {
            $course['name'] = $course->course->name;
            $sections = $course->course->sections;
            $course['time'] = 0;
            foreach ($sections as $section) {
                $course['time'] = $course['time'] + $section->duration;

            }
            echo $course['duration'] . "\n";
            if (is_null($course->coursepart())) {
                $course['start_time'] = "ساعت 12:00";
            } else {
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
            $course['Durations'] = 0;
            $counter = 0;
            $time = 0;
            foreach ($course->course->sections as $section) {
                $counter++;
                $time += $section->time;
            }
            $course['duration'] = $time;
            $course['sections_count'] = $counter;
            $course['rate'] = -1;
            $check = 0;
            foreach ($course->reviews as $review) {
                if ($check == 0) {
                    $course['rate'] = 0;
                    $check = 1;
                }
                $course['rate'] += $review->pivot->rate;
            }
            if ($check == 1)
                $course['rate'] = $course['rate'] / count($course->reviews);
            $course['reviews_count'] = count($course->reviews);
            $course['category_name'] = $course->course->category->name;
        }
        $tags = Tag::all();
        $categories = Category::all();
        $teachers = Teacher::all();

        $popular_courses = Usecourse::whereHas('reviews', function ($q) {
            $q->where('rate', '>=', 5);
        })->paginate(3);

//        $popular_courses = Usecourse::whereHas('reviews', function ($q) {
//        $q->select(DB::raw('avg(rate) as avg_rate, course_id'))
//            ->groupBy('course_id')->having('avg_rate','>=',5);
//            })->get();

        foreach ($popular_courses as $course) {
            $course['name'] = $course->course->name;
            $sections = $course->course->sections;
            $course['time'] = 0;
            foreach ($sections as $section) {
                $course['time'] = $course['time'] + $section->duration;

            }
            echo $course['duration'] . "\n";
            if (is_null($course->coursepart())) {
                $course['start_time'] = "ساعت 12:00";
            } else {
                $course['start_time'] = $course->coursepart()->first()->start;
            }
        }

        return view('courses.courses-list')->with(['courses' => $courses, 'categories' => $categories, 'popular_courses' => $popular_courses]);
    }
}
