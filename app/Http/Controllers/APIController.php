<?php

namespace App\Http\Controllers;
use App\Usecourse;
use Illuminate\Http\Request;
use App\User;
use Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class APIController extends Controller
{

    public function register(Request $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        User::create($input);
        return response()->json(['result'=>true]);
    }

    public function login(Request $request)
    {
        $input = $request->all();
        if (!$token = JWTAuth::attempt($input)) {
            return response()->json(['result' => 'wrong email or password.']);
        }
        return response()->json(['result' => $token]);
    }

    public function get_user_details(Request $request)
    {
        $input = $request->all();
        $user = JWTAuth::toUser($input['token']);
        return response()->json(['result' => $user]);
    }

    public function listcourse()
    {
        $result=[
            "result"=>"ok"
        ];
        $courses = Usecourse::where('activated', 1)->paginate(5);
        $count_course = count(Usecourse::where('activated', 1)->get());
        foreach ($courses as $course) {
            $course['name'] = $course->course->name;
            $sections = $course->course->sections;
            $course['time'] = 0;
            foreach ($sections as $section) {
                $course['time'] = $course['time'] + $section->duration;
            }
            $counter = 0;
            $course['sections_count'] = $counter;
            $course['rate'] = -1;
            $check = 0;
//            foreach ($course->reviews as $review) {
//                if ($check == 0) {
//                    $course['rate'] = 0;
//                    $check = 1;
//                }
//                $course['rate'] += $review->pivot->rate;
//            }
//            if ($check == 1)
//                $course['rate'] = $course['rate'] / count($course->reviews);
//            $course['reviews_count'] = count($course->reviews);
            $course['category_name'] = $course->course->category->name;
        }
        $result['courses']=$courses;
        $result['count']=$count_course;
        return $result;
    }

    public function getexercises(Request $request,$id)
    {
        $result=array();
        $user = JWTAuth::toUser($request->input('token'));
        $course=User::whereHas('courses', function ($query)use($id,$user) {
            $query->where('takecourse.course_id', '=', $id)->where('takecourse.user_id',$user->id);
        })->first();
        if($course){
            $exercises=Usecourse::find($id)->excercises;
            $result['result']='ok';
            $result['data']=json_encode($exercises, JSON_FORCE_OBJECT);
            return $result;
        }
        else{
            $result['result']='fail';
            return $result;
        }

    }

}
