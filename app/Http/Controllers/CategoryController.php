<?php

namespace App\Http\Controllers;

//use Illuminate\Support\Facades\DB;
use DB;
use App\Category;
use App\Usecourse;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryController extends Controller
{
    public function __construct(Category $cat)
    {
        $this->category=$cat;

    }
    /*
     *
     */
    public function index()
    {
        $categories=Category::all();
        return $categories;
    }
    /*
     *
     */
    public function showCategory($id)
    {
        DB::connection()->enableQueryLog();

        $categories = $this->category->fetchAll();
        //$categories = Category::all();
//        $categories = Category::where('name','HTML')->get();

        $log = DB::getQueryLog();

        print_r($log); // result : Array ( [0] => Array ( [query] => select * from `categories` [bindings] => Array ( ) [time] => 0.52 ) )

        return $categories;

    }
    /*
     *
     */
    public function show(Request $request,Category $category)
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $courses=$category->courses;
        //Adding Use Course Duration From its Sections
//        $courses = Usecourse::paginate(10);

//        $count_course=count(Usecourse::all());
        #todo courses is from Course
        foreach ($courses as $course){
            $course['name'] = $course->course->name;
            $course['Durations']=0;
            $counter=0;
            $time=0;
            foreach ($course->sections as $section){
                $counter++;
                $time+=$section->time;
            }
            $course['duration']=$time;
            $course['sections_count']=$counter;
            $course['rate']=-1;
            $check=0;
            foreach ($course->usecourse->reviews as $review){
                if($check==0){
                    $course['rate']=0;
                    $check=1;
                }
                $course['rate'] += $review->pivot->rate;
            }
            if($check==1)
                $course['rate'] = $course['rate']/count($course->usecourse->reviews());
            $course['reviews_count'] = count($course->usecourse->reviews());
            $course['category_name']=$course->category->name;
        }
        $tags = Tag::all();
        $categories=Category::all();

        $total=count($courses);
        $col =$courses;
        $perPage = 10;
        $offset = ($currentPage * $perPage) - $perPage;
        $entries = new LengthAwarePaginator(array_slice($courses, $offset, $perPage, true), count($col), $perPage, $currentPage,['path' => $request->url(), 'query' => $request->query()]);
        $entries->setPath("/categories/$category->id");
        return view('courses.courses-list')->with(['Data'=>$entries,'course_count'=>$total,'tags'=>$tags,'categories'=>$categories]);

    }
}
