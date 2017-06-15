<?php

namespace App\Http\Controllers;

use App\Category;
use App\Package;
use App\Tag;
use App\User;
use App\Review;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;



class PackController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Response
     */
    public function index()
    {
        $packs=Package::withCount('users')->orderBy('users_count', 'desc')->paginate(6);
        foreach ($packs as $pack){
//       $pack['count_courses']=count($pack->courses);
//            $i=1;
//            foreach ($pack->courses as $course)
//            {
//                if($i==4){
//                    break;
//                }
//                $pack['relate'.$i]=$course->name;
//                $i++;
//            }
            $pack['courses'] = $pack->courses()->paginate(3);
            }

        return view('packages/packages-list')->with(['packs'=>$packs]);

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
        $courses = $pack->courses()->get();
        $teachers = $pack->teachers()->get();
        #todo it's just give reviews of one user
        $reviews = $pack->reviews()->wherePivot('enable', 1)->get();
//        return $reviews;
        //return  $reviews;
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
        return view('packages/package-single-item')->with(['pack'=>$pack,'reviews'=>$reviews,'teachers'=>$teachers,'courses'=>$courses,'tags'=>$tags,'categories'=>$categories]);

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

    public function review($id)
    {
        $input = Input::all();
        $rules = array(
            'Name'      => 'Required|Min:3|Max:80',                       // just a normal required validation
            'Email'     => 'Required|Min:0|Max:80|Email',    // required and must be unique in the ducks table
            'Comment'   => 'Required'
        );
        $messages = [
            'Name.required' => 'وارد کردن نام شما ضروری است ',
            'Comment.required' => 'وارد کردن پیام  شما ضروری است ',
            'Name.min' => 'نام کامل خود را وارد نمایید ( حداقل ۷ کاراکتر) ',
            'Comment.min' => 'حداقل ۷ کاراکتر لازم است'
        ];
        $validator = Validator::make($input,$rules,$messages);
        $pack = Package::find($id);
        if (!$validator->fails()) {
            $review = new Review(array('comment' => $input['Comment'],'enable' => 0));
            //$comment->user()->name = $input['Name'];
            //$review->packages()->pivot->comment = $input['Comment'];
            //$user = User::find(1);
            //$user->packagereviews()->save($review);
            //$pack->reviews()->associate($review);
            //$user->account()->associate($account);
            $user = User::find(1)->get();

            $user->packagereviews()->attach($id,['comment' => $input['Comment'],'enable' => 0]);
            try{
                //$user=\Auth::user();

                return $pack->reviews();
            }
            catch ( \Illuminate\Database\QueryException $e){
                return Redirect::back()->withErrors(['errorr'=>'. مشکلی در ثبت پیام شما به وجود آمد مججدا تلاش بفرمایید']);
            }

        }
        else{
            return Redirect::back()
                ->withErrors($validator)->withInput();
        }
        
    }

}
