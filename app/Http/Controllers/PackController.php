<?php

namespace App\Http\Controllers;

use App\Category;
use App\Package;
use App\Tag;
use App\User;
//use Illuminate\Http\Request;
//use Illuminate\Pagination\LengthAwarePaginator;


class PackController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Response
     */
    public function index()
    {
        $packs=Package::all();
        foreach ($packs as $pack){
            $pack['count_courses']=count($pack->courses);
//            $i=1;
//            foreach ($pack->courses as $course)
//            {
//                if($i==4){
//                    break;
//                }
//                $pack['relate'.$i]=$course->name;
//                $i++;
//            }
        }
        return view('courses.packages')->with(['Packs'=>$packs]);

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Response
     */
    public function show($pack)
    {
        //package information
//        $pack['title']            =  $pack->title;
//        $pack['image']            =  $pack->image;
//        $pack['description']      =  $pack->description;
//        $pack['open_time']        =  $pack->open_time;
//        $pack['requirement']      =  $pack->requirement;
//        $pack['work_description'] =  $pack->work_description;
//        $pack['work_start']       =  $pack->work_start;
//        $pack['goal']             =  $pack->goal;
//        $pack['duration']         =  $pack->duration;
//        $pack['price']            =  $pack->price;

        //courses
        $courses=$pack->courses()->paginate(10);
        foreach ($courses as $course){
            //rate
//            $course['rate']=0;
//            foreach ($course->usecourse as $usecourse) {
//                foreach ($usecourse->reviews as $review ) {
//                    $course['rate'] += $review->pivot->rate;
//                }
//            }
//            $total = 0;
//            foreach ($course->usecourse as $usecourse) {
//                foreach ($usecourse->reviews as $review ) {
//                    $total++;
//                }
//            }
//            $course['rate'] = $course['rate']/$total;

            //category
            $course['category_name'] = $course->category->name;
            //course name
            $course['name'] = $course->name;
            //introduction of course
        }
        $pack['courses']=$courses;
        $pack['course_count'] = count($courses);
            /// how to use courses data of pack
            //foreach($pack['courses'] as $course){
            //    echo $course['introduction'];
            //}
        $tags=Tag::all();
        $categories=Category::all();
        //return view('courses.courses-list')->with(['Data'=>$courses,'Search'=>'1','Tags'=>$tags,'Categories'=>$Categories,'Pack'=>$pack]);
        return view('courses.courses-list')->with(['pack'=>$pack,'tags'=>$tags,'categories'=>$categories]);

    }
    /**
     * Display the specified resource.
     *
     * @return boolean
     */
    public function Take(Package $pack,$payment,$discount,$period)
    {
        $StartDate=date('Y-m-d H:i:s');
        $days=$period;
        $final_time= strtotime(date("Y-m-d H:i:s", strtotime($StartDate)) . " +$days day");
        $final_time = date("Y-m-d H:i:s",$final_time);
        $user=\Auth::user();
        try {
            $user->packages()->attach($pack->id,['paid'=>$payment,'discount_used'=>$discount]);
        }
        catch ( \Illuminate\Database\QueryException $e){

            return 0;
        }
        return 1;
    }

}
