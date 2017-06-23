<?php

namespace App\Http\Controllers;

use App\Course;
use App\Package;
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
use Illuminate\Support\Facades\DB;



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
        $courses = Usecourse::where('activated', 1)->paginate(3);
        $count_course = count(Usecourse::where('activated', 1));
        $count_student = count(User::where('activated', 1));
        $recent_courses = Usecourse::orderBy('created_at', 'desc')->where('activated', 1)->paginate(6);;
        foreach ($courses as $course) {
            $course['name'] = $course->course->name;
            $sections = $course->course->sections;
            $course['time'] = 0;
            foreach ($sections as $section) {
                $course['time'] = $course['time'] + $section->duration;

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

        }
        return view('courses.courses-list')->with(['count_student' => $count_student, 'course_count' => $count_course, 'recent_courses' => $recent_courses, 'courses' => $courses, 'tags' => $tags, 'categories' => $categories, 'teachers' => $teachers, 'popular_courses' => $popular_courses]);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course=Usecourse::findorfail($id);
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

        $course['rate'] = -1;
        $check = 0;
        foreach ($course->reviews()->get() as $review) {
            if ($check == 0) {
                $course['rate'] = 0;
                $check = 1;
            }
            $course['rate'] += $review->pivot->rate;
        }
        if ($check == 1)
            $course['rate'] = $course['rate'] / count($course->reviews);
        $course['reviews_count'] = count($course->reviews);

        //$intro=$course->course()->sections()->where('part',0)->first();

        $intro = $course->course->introduction;
//            $course->course()->whereHas('sections', function ($q) {
//            $q->where('part', 0);})->first()->introduction;

        $course['Durations'] = 0;
        $counter = 0;
        $time = 0;


//        return $course->course->sections;

        foreach ($course->course->sections as $section) {
            $counter++;
            $time += $section->duration;
        }
        $course['duration'] = $time;
        $course['sections_count'] = $counter;
        $students = count($course->takers);
        $course['students_count'] = $students;
        $course['category_name'] = $course->course->category->name;
        $reviewss = $course->reviews()->wherePivot('enable', 1)->get();
        $r_count = 0;
        $reviews = array();
        while ($r_count < 5 && $r_count < count($reviewss)) {
            $reviews[] = $reviewss[$r_count];
            $r_count++;
        }
        $reviews = $course->reviews()->get();
        return view('courses/course-single-item')->with(['course' => $course, 'reviews' => $reviews]);

    }

    /*
     * @return packages
     */
    public function pack($id)
    {
        $course=Usecourse::findorfail($id);
        $packages = $course->course->packages()->get();
        return view('packages/packages-list')->with(['packs' => $packages]);
    }

    /**
     * @return user take that course
     */
    public function usertakecourse($id)
    {
        $course=Usecourse::findorfail($id);
        $users = $course->takers;
        return view('course.users', ['users' => $users]);

    }

    public function ShowReviews($id)
    {
        $course=Usecourse::findorfail($id);
        $reviews = $course->reviews()->wherePivot('enable', 1)->get();
        foreach ($reviews as $review) {
            $user = User::findorfail($review->pivot->user_id);
            $review['user_name'] = $user->name;
            $review['user_image'] = $user->image;
            $review['user_comment'] = $user->comment;
        }
        if (\Auth::check()) {
            $able = 1;
        } else
            $able = 0;

        return view('courses.course-review')->with(['Data' => $reviews, 'able' => $able]);
    }

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
        $perPage = 6;
        $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $courses = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);
        if (isset($input['category-id']) and $input['search']) {
            $category = Category::where('name', $input['category-id'])->first();
            $rs = Course::where('category_id', $category->id)->get();
            $cs = Course::whereHas('tags', function ($query) use ($input) {
                $query->where('tag_name', 'like', $input['search']);
            })->get();
            $entries = collect();
            foreach ($rs as $course) {
                foreach ($cs as $c) {
                    $temp = Usecourse::whereHas('course', function ($query) use ($c) {
                        $query->where('course_id', $c);
                    })->orwhereHas('course', function ($query) use ($course) {
                        $query->where('course_id', $course->id);
                    })->get();
                    $entries = $entries->merge($temp);
                    $col =$entries;
                    $perPage = 6;
                    $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
                    $courses = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);
                }
            }
        } elseif ($input['search']) {
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
                $perPage = 6;
                $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
                $courses = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);

            }
        } else {
            $category = Category::where('name', $input['category-id'])->first();
            $cs = Course::where('category_id', $category->id)->get();
            $entries = collect();
            foreach ($cs as $course) {
                $temp = Usecourse::whereHas('course', function ($query) use ($course) {
                    $query->where('course_id', $course->id);
                })->get();
                $entries = $entries->merge($temp);
                $col =$entries;
                $perPage = 6;
                $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
                $courses = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);
            }
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


//        foreach ($courses as $course) {
//            // cannot use $course->teachers()->get(); because each have many usecourse ...
//            $course['teachers'] = "";
//            $counter = 0;
//            foreach ($course->usecourse as $usecourse) {
//                foreach ($usecourse->teachers as $teacher) {
//                    if ($counter)
//                        $course['teachers'] = $course['teachers'] . "," . $teacher->name;
//                    else
//                        $course['teachers'] = $teacher->name;
//                    $counter++;
//                }
//            }
//            $rate_value = -1;
//            $check = 0;
//            $rate_count = 0;
//            foreach ($course->usecourse as $usecourse) {
//                foreach ($usecourse->reviews as $review) {
//                    if ($check == 0) {
//                        $rate_value = 0;
//                        $check = 1;
//                    }
//                    $rate_value += $review->pivot->rate;
//                    $rate_count++;
//                }
//            }
//            if ($check == 1)
//                $rate_value = $rate_value / $rate_count;
//            $course['rate_value'] = $rate_value;
//            $course['rate_count'] = $rate_count;
//
//            $count = 0;
//            $duration = 0;
//            foreach ($course->sections as $section) {
//                $count++;
//                $duration += $section->$duration;
//            }
//            $course['section_duration'] = $duration;
//            $course['section_count'] = $count;
//            $course['category'] = $course->category->name;
//            //???
//            if (!in_array($course->id, $list)) {
//                $result[] = $course;
//                $list[] = $course->id;
//            }
//        }

//        $category_list = array();
//        $category_number = 0;
//        while (Input::has('category' . $category_number)) {
//            $category_list[] = $input['category' . $category_number];
//            $category_number++;
//        }
//        $tags = Tag::all();
//
//        if ($category_number == 0) {
//            $total = count($result);
//            $col = $result;
//            $perPage = 10;
//            $offset = ($currentPage * $perPage) - $perPage;
//            $entries = new LengthAwarePaginator(array_slice($result, $offset, $perPage, true), count($col), $perPage, $currentPage, ['path' => $request->url(), 'query' => $request->query()]);
//            $entries->setPath('/Courses/Search');
//            return view('courses.courses-list')->with(['entries' => $entries, 'course_count' => $total, 'search' => '1', 'tags' => $tags, 'categories' => $categories]);
//        } else {
//            $Data = array();
//            foreach ($result as $item) {
//                if (in_array($item->category->name, $category_list)) {
//                    $Data[] = $item;
//                }
//            }
//            $total = count($Data);
//            $col = $Data;
//            $perPage = 10;
//            $offset = ($currentPage * $perPage) - $perPage;
//            $entries = new LengthAwarePaginator(array_slice($Data, $offset, $perPage, true), count($col), $perPage, $currentPage, ['path' => $request->url(), 'query' => $request->query()]);
//            $entries->setPath('/Courses/Search');
//            //view('courses.courses-list')->with(
//            return ['entries' => $entries, 'courses' => $courses, 'course_count' => $total, 'search' => '1', 'tags' => $tags, 'categories' => $categories];
//        }
//        }


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
    public function buy($id)
    {
        $course=Usecourse::findorfail($id);
        $user=\Auth::user();
        $user = User::find(1);
        if(isset($user))
            $finance = $user->finance()->first();
        else
            $finance = 0;
        return view('BuyOperations.shop-cart')->with(['course'=>$course,'finance'=>$finance]);
    }
    /*
     * 
     */
    public function send()
    {
        $input = Input::all();
        $course = Usecourse::findorfail($input['id']);
        // send
        $amount = $course->price*10000; // به ریال
        $api = 'API';
        $redirect = 'Callback';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://pay.ir/payment/send');
        curl_setopt($ch, CURLOPT_POSTFIELDS,"api=$api&&amount=$amount&redirect=$redirect");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result);
        $transId = $result->transId;
        if($result->status) {
            $go = "https://pay.ir/payment/gateway/$result->transId";
            $go = view('BuyOperations.shop-cart-approval')->with(['transId'=>$transId,'course'=>$course]);
            header("Location: $go");
        } else {
            echo $result->errorMessage;
        }
        // end send
        
    }

    /*
     *
     */
    public function verify($api, $transId)
    {
        //verify
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://pay.ir/payment/verify');
        curl_setopt($ch, CURLOPT_POSTFIELDS, "api=$api&transId=$transId");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $res = curl_exec($ch);
        curl_close($ch);
        return $res;
        //verify
    }
}