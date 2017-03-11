<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        return $categories;
    }

    public function show(Request $request,Category $category)
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $courses=$category->courses;
        //Adding Use Course Duration From its Sections
//        $courses = Usecourse::paginate(10);

        $count_course=count(Usecourse::all());
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
        $tags = Tag::all();
        $categories=Category::all();

        $total=count($courses);
        $col =$courses;
        $perPage = 10;
        $offset = ($currentPage * $perPage) - $perPage;
        $entries = new LengthAwarePaginator(array_slice($courses, $offset, $perPage, true), count($col), $perPage, $currentPage,['path' => $request->url(), 'query' => $request->query()]);
        $entries->setPath("/categories/$category->id");
        return view('courses.courses-list')->with(['Data'=>$entries,'course_count'=>$total]);

    }
}
