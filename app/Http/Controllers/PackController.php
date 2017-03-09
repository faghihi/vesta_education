<?php

namespace App\Http\Controllers;

use App\Category;
use App\Pack;
use App\Package;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;


class PackController extends Controller
{
    public function RetrieveAll()
    {
        $packs=Package::all();
        foreach ($packs as $pack){
            $pack->count_courses=count($pack->courses);
        }

        return $packs;
    }
    public function index()
    {
        $packs=Package::all();
        foreach ($packs as $pack){
            $pack['count_courses']=count($pack->courses);
            $counter=$pack->courses;
            $i=1;
            foreach ($pack->courses as $course)
            {
                if($i==4){
                    break;
                }
                $pack['relate'.$i]=$course->name;
                $i++;
            }
        }
//        return $packs;
        return view('courses.packages')->with(['Packs'=>$packs]);

    }

    public function show(Package $pack,Request$request)
    {
        $courses=$pack->courses()->paginate(10);
        foreach ($courses as $course){

            foreach ($course->rates as $rate) {
                $counter = $course->category->name;

            }
        }

        $tags=Tag::all();
        $Categories=Category::all();
        return view('courses.courses-list')->with(['Data'=>$courses,'course_count'=>count($courses),'Search'=>'1','Tags'=>$tags,'Categories'=>$Categories,'Pack'=>1]);

    }

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
