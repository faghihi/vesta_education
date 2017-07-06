<?php

namespace App\Http\Controllers;

use App\Course;
use App\Discount;
use App\Finance;
use App\Message;
use App\Package;
use App\Teacher;
use App\Transactions;
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
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use phpDocumentor\Reflection\Types\Null_;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class CourseController extends Controller
{
    protected $usercontroller;

    public function __construct(UserController $usc)
    {
       $this->usercontroller=$usc;

    }


    /**
     * Display a listing of the courses with teachers , rate , number of reviews , durations , number of section , category .
     *
     * @return $courses;
     */
    public function index()
    {
        //Adding Use Course Duration From its Sections
        $courses = Usecourse::where('activated', 1)->paginate(6);
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
            $counter = 0;
//            $time = 0;
//            foreach ($course->course->sections as $section) {
//                $counter++;
//                $time += $section->time;
//            }
//            $course['duration'] = $time;
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
            $q->where('rate', '>', 3);
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

    /*
     *
     */
    public function category($id)
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $category = Category::findorfail($id);
        $cs = $category->courses;
//        return $cs;
        $entries = collect();
        $col =$entries;
        $perPage = 6;
        $courses=[];
        $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
        foreach ($cs as $course) {
            $temp = Usecourse::where('activated', 1)->whereHas('course', function ($query) use ($course) {
                $query->where('course_id', $course->id);
            })->get();
            $entries = $entries->merge($temp);
            $col =$entries;

            $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
            $courses = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);
        }
        $categories = Category::all();
        foreach ($courses as $course) {
            $course['name'] = $course->course->name;
            $sections = $course->course->sections;
            $course['time'] = 0;
            foreach ($sections as $section) {
                $course['time'] = $course['time'] + $section->duration;

            }
            echo $course['duration'] . "\n";
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
        return view('courses.courses-list')->with(['courses' => $courses, 'categories' => $categories, 'popular_courses' => $popular_courses]);
    }
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=\Auth::user();
        $comment_enable=0;
        $course=Usecourse::findorfail($id);
        if(!$course->activated){
            \App::abort('404');
        }
        if(is_null($user)){
            $enable = 0;
        }
        else{
            $comment_enable=1;

            $user_course = Usecourse::whereHas('takers', function ($query) use ($user,$id) {
                $query->where('user_id', $user->id)->where('course_id',$id);
            })->get();

            if(count($user_course) ){
                $enable = 1;
            }
            else{
                $enable = 0;
                foreach ($user->packages as $package){
                    foreach ($package->courses as $cs)
                    {
                        if($cs->id==$course->course->id)
                            $enable=1;
                    }
                }
            }
        }

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
        $excercises = $course->excercises()->get();


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
        foreach ($course->reviews()->wherePivot('enable', '=', 1)->get() as $review) {
            if ($check == 0) {
                $course['rate'] = 0;
                $check = 1;
            }
            $course['rate'] += $review->pivot->rate;
        }
        if ($check == 1)
            $course['rate'] = $course['rate'] / count($course->reviews()->wherePivot('enable', '=', 1)->get());
        $course['reviews_count'] = count($course->reviews()->wherePivot('enable', '=', 1)->get());

        //$intro=$course->course()->sections()->where('part',0)->first();

        $intro = $course->course->introduction;
//            $course->course()->whereHas('sections', function ($q) {
//            $q->where('part', 0);})->first()->introduction;

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

        return view('courses/course-single-item')->with(['comment_enable'=>$comment_enable,'course' => $course, 'reviews' => $reviews,'excercises'=>$excercises,'enable'=>$enable]);

    }

    /*
     * @return packages
     */
    public function pack($id)
    {
        $course=Usecourse::findorfail($id);
        $packages = $course->packages()->get();
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
                    $temp = Usecourse::where('activated',1)->whereHas('course', function ($query) use ($c) {
                        $query->where('course_id', $c);
                    })->orwhereHas('course', function ($query) use ($course) {
                        $query->where('course_id', $course->id);
                    })->get();
                    $entries = $entries->merge($temp);
                    $col =$entries;
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
                $temp = Usecourse::where('activated',1)->whereHas('course', function ($query) use ($c) {
                    $query->where('course_id', $c->id);
                })->get();
                $entries = $entries->merge($temp);
                $col =$entries;

                $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
                $courses = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);

            }
        } elseif(isset($input['category-id'])) {
            $category = Category::where('name', $input['category-id'])->first();
            $cs = Course::where('category_id', $category->id)->get();
            $entries = collect();
            foreach ($cs as $course) {
                $temp = Usecourse::where('activated',1)->whereHas('course', function ($query) use ($course) {
                    $query->where('course_id', $course->id);
                })->get();
                $entries = $entries->merge($temp);
                $col =$entries;

                $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
                $courses = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);
            }
        }else{
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
        }

        return view('courses.courses-list')->with(['courses' => $courses, 'categories' => $categories, 'popular_courses' => $popular_courses]);
    }

    /*
     *
     */
    public function review()
    {
        $user=\Auth::user();
//        $user = User::find(1);
        $input = Input::all();
        $id = $input['id'];
        $rules = array(
            'Comment'   => 'Required'
        );
        $messages = [
            'Comment.required' => 'وارد کردن پیام  شما ضروری است ',
            'Comment.min' => 'حداقل ۷ کاراکتر لازم است'
        ];
        $rate=0;
        if(isset($input['1']))$rate=1;
        if(isset($input['2']))$rate=2;
        if(isset($input['3']))$rate=3;
        if(isset($input['4']))$rate=4;
        if(isset($input['5']))$rate=5;


        $validator = Validator::make($input,$rules,$messages);
        $course = Usecourse::findorfail($id);

        if (!$validator->fails()) {

            $user->coursereviews()->attach($id, ['comment' => $input['Comment'],'rate' => $rate,'enable' =>0]);
            try{
                return Redirect::to(\URL::previous() . "#comments")->withErrors([' پیام شما ارسال شد ', 'نظر شما بعد از تایید مدیریت نمایش داده خواهد شد. ']);
            }
            catch ( \Illuminate\Database\QueryException $e){
                return Redirect::to(\URL::previous() . "#comments")->withErrors(['errorr'=>'. مشکلی در ثبت پیام شما به وجود آمد مججدا تلاش بفرمایید']);
            }

        }
        else{
            return Redirect::to(\URL::previous() . "#comments")
                ->withErrors($validator)->withInput();
        }

    }
    /*
     *
     */
    public function buy($id)
    {
        $course=Usecourse::findorfail($id);
        $user=\Auth::user();
        if(isset($user))
            $finance = $user->finance()->first();
        else
            $finance = 0;
        if($course->activated==0){
            \App::abort('404');
        }
        foreach($user->courses as $cs){
            if($cs->id==$course->id){
                return redirect()->back();
            }
        }

        foreach ($user->packages as $package){
            foreach ($package->courses as $cs)
            {
                if($cs->id==$course->course->id)
                    return redirect()->back();
            }
        }
        return view('courses.shop-cart')->with(['course'=>$course,'finance'=>$finance]);
    }

    function send($api, $amount, $redirect, $factorNumber=null) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://pay.ir/payment/send');
        curl_setopt($ch, CURLOPT_POSTFIELDS,"api=$api&amount=$amount&redirect=$redirect&factorNumber=$factorNumber");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $res = curl_exec($ch);
        curl_close($ch);
        return $res;
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
    public function CourseBuy($id)
    {
        $input=Input::all();
        $Code='0';
        $user=\Auth::user();
        $course = Usecourse::findorfail($id);
        if($course->activated==0){
            \App::abort('404');
        }
        foreach($user->courses as $cs){
            if($cs->id==$course->id){
                return redirect('/courses-grid');
            }
        }

        foreach ($user->packages as $package){
            foreach ($package->courses as $cs)
            {
                if($cs->id==$course->course->id)
                    return redirect('/courses-grid');
            }
        }
        $amount = $course->price*10000;
        if(isset($input['Code']) && $input['Code']){
            $Code=$input['Code'];
            $res=$this->Check_code($Code,$course);
            $amount = $res['price']*10;
            if($res['error']){
                $Code='0';
            }
        }
        // به ریال
        $api = 'ad19e8fe996faac2f3cf7242b08972b6';
        $redirect = 'http://vestacamp.vestaak.com/course/verify';
        $result = $this->send($api,$amount,$redirect);
        $result = json_decode($result);
        if($result->status) {
            $trans=new Transactions();
            $trans->user_id=\Auth::user()->id;
            $trans->transid=$result->transId;
            $trans->amount=$amount;
            $trans->type='course.'.$course->id.'.'.$Code;
            try{
                $trans->save();
            }
            catch ( \Illuminate\Database\QueryException $e){
                return 0;
            }
            $go = "https://pay.ir/payment/gateway/$result->transId";
            return redirect($go);
        } else {
            $message="مشکلی در اتصال به درگاه پرداخت به وجود آمده است لطفا کمی بعد تلاش کنید.";
            return view('pay-error.pay-error')->with(['message'=>$message]);
//            return $result;
        }

    }

    public function CourseBuyVerify()
    {
        $api = 'ad19e8fe996faac2f3cf7242b08972b6';
        $transId = $_POST['transId'];
        $result = $this->verify($api,$transId);
        $result = json_decode($result);
        $trans=Transactions::where('transid',$transId)->first();
        if(is_null($trans) || $trans->user_id!=\Auth::id() || $result->status!=1 || $result->amount!=$trans->amount){
//            return redirect('/pay?error=error');
            $message="مشکلی در تراکنش شما به وجود آمده است، لطفا کمی بعد تلاش کنید.";
            return view('pay-error.pay-error')->with(['message'=>$message]);
        }
        $trans=Transactions::findorfail($trans->id);
        $trans->save();
        $pieces = explode(".", $trans->type);
        $course=Usecourse::findorfail(intval($pieces[1]));
        $Code=$pieces[2];
        $cardnumber = $_POST['cardNumber'];
        $trans->type=$trans->type.'='.$cardnumber;
        if ($Code=='0'){
            $Code=0;
        }
        $res=$this->takecourse($course,\Auth::user(),$Code);
//        return $res;
        if(! $res['error']){
            $trans->condition=1;
            try{
                $trans->save();
            }
            catch ( \Illuminate\Database\QueryException $e){
                $message="مشکلی در تراکنش شما به وجود آمده است، لطفا کمی بعد تلاش کنید.";
                return view('pay-error.pay-error')->with(['message'=>$message]);
            }
            if(\Auth::user()->invitedby){
                $invitedby=User::find(\Auth::user()->invitedby);
                if((! is_null($invitedby))){
                    $ress=$this->usercontroller->AdjustUserCredit($invitedby,'5');
                    if($ress){
                        $msg=new Message();
                        $msg->user_id=$invitedby->id;
                        $msg->subject='هدیه وستاکمپ به شما تعلق گرفت.';
                        $msg->text='به خاطر خرید دوست شما که دعوتش کرده بودید ۵ هزار تومان اعتبار از وستاکمپ هدیه گرفتید';
                        $msg->save();
                    }
                }
            }
            return  view('BuyOperations.shop-cart-approval')->with(['transId'=>$transId,'course'=>$course,'price'=>$trans->amount/10000]);
        }
        else{
//            return redirect('/pay?error=error');
            $message="تراکنش با موفقیت انجام شد، ولی مشکلی به وجود آمده است ، با بخش پشتیبانی تماس بگیرید. | "." کد پیگیری تراکنش :$transId ";
            return view('pay-error.pay-error')->with(['message'=>$message]);
        }
    }

    public function takecourse($course,$user,$code)
    {
            $response=[];
            $price = $course->price;
        /*
         * testing
         */
//        $response['error'] = $code; // not such a code in valid
//        $response['price'] = $price;
            if($code) {
                $discount = Discount::where('code', $code)->first();
//                $userdiscount = Userdiscount::where([['code', $code],['user_id',$user->id]])->first();
                if (is_null($discount) /*and  is_null($userdiscount)*/) {
                    $response['error'] = 25; // not such a code in valid
                    $response['price'] = $price;
                    return $response;
                }
                else
                {
                    if(!is_null($discount)) {
                        if ($discount->count <= 0 or $discount->disable == 1|| $discount->course_id!=$course->id) {
                            $response['error'] = 2; // not available as it is expired
                            $response['price'] = $price;
                            return $response;
                        }
                        else
                        {
                            $discount->count -= 1;
                            try{
                                $discount->save();
                            }
                            catch ( \Illuminate\Database\QueryException $e){
                                $response['error']=10;
                                return $response;
                            }
                            $response['error'] = 0; // there is no error
                            if ($discount->type == 0) {
                                $newprice = $price * (100-$discount->value) / 100;
                            } else {
                                $newprice = $price - $discount->value;
                            }
                            $response['price'] = $newprice;
                            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                            $charactersLength = strlen($characters);
                            $length=12;
                            $randomString = '';
                            for ($i = 0; $i < $length; $i++) {
                                $randomString .= $characters[rand(0, $charactersLength - 1)];
                            }
                            $generate=$user->email.'-'.$randomString;
                            QrCode::format('png')->size('600')->generate($generate, public_path().'/images/Qrfile/'.$generate.'.png');
                            $qr_address='/images/Qrfile/'.$generate.'.png';
                            try{
                                $user->courses()->attach($course->id,['paid' => $newprice , 'discount_used' => $code,'QRCodeData'=>$generate,'QRCodeFile'=>$qr_address]);
                            }
                            catch ( \Illuminate\Database\QueryException $e){
                                $response['error']=$e;
                                return $response;
                            }
                            return $response;
                        }
                    }
                    else{
                        $response['error']=1;
                        $response['price']=$price;
                        return $response;
                    }
                }
            }
            else{
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $length=12;
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                $generate=$user->email.'-'.$randomString;
                QrCode::format('png')->size('600')->generate($generate, public_path().'/images/Qrfile/'.$generate.'.png');
                $qr_address='/images/Qrfile/'.$generate.'.png';
                try{
                    $user->courses()->attach($course->id,['paid' => $price , 'discount_used' => '0','QRCodeData'=>$generate,'QRCodeFile'=>$qr_address]);
                }
                catch ( \Illuminate\Database\QueryException $e){
                    $response['error']=$e;
                    $response['price']=$price;
                    return $response;
                }
                $response['error']=0;
                $response['price']=$price;
                return $response;
            }
    }

    public function Check_code($code,$course)
    {
        $price=$course->price*1000;
        if($code) {
            $discount = Discount::where('code', $code)->first();
//                $userdiscount = Userdiscount::where([['code', $code],['user_id',$user->id]])->first();
            if (is_null($discount) /*and  is_null($userdiscount)*/) {
                $response['error'] = 1; // not such a code in valid
                $response['price'] = $price;
                return $response;
            }
            else
            {
                if(!is_null($discount)) {
                    if ($discount->count <= 0 or $discount->disable == 1|| $discount->course_id!=$course->id) {
                        $response['error'] = 2; // not available as it is expired
                        $response['price'] = $price;
                        return $response;
                    }
                    else
                    {
                        $response['error'] = 0; // there is no error
                        if ($discount->type == 0) {
                            $newprice = $price * (100-$discount->value) / 100;
                        } else {
                            $newprice = $price - $discount->value;
                        }
                        $response['price'] = $newprice;
                        return $response;
                    }
                }
            }
        }
    }

    public function CourseBuycredit($id)
    {
        $response=[];
        $code=0;
        $input=Input::all();
        $user=\Auth::user();
        $course=Usecourse::findorfail($id);
        if($course->activated==0){
            \App::abort('404');
        }
        foreach($user->courses as $cs){
            if($cs->id==$course->id){
                return redirect('/courses-grid');
            }
        }

        foreach ($user->packages as $package){
            foreach ($package->courses as $cs)
            {
                if($cs->id==$course->course->id)
                    return redirect('/courses-grid');
            }
        }



        if(isset($input['Code']) && !empty($input['Code'])){
            $code=$input['Code'];
        }

        $price = $course->price;
        #tranaction create
        $transaction_c = new Transactions();
        $transaction_c->user_id=$user->id;
        $transaction_c->amount=$price;
        $transid=rand(111111111,999999999);
        $transaction_c->transid=$transid;
        $transaction_c->condition=0;
        $transaction_c->type='course.'.$course->id.'.'.$code;
        $transaction_c->save();

        $user=\Auth::user();
        if($code) {

            $discount = Discount::where('code', $code)->first();
//                $userdiscount = Userdiscount::where([['code', $code],['user_id',$user->id]])->first();
            if (is_null($discount) /*and  is_null($userdiscount)*/) {
                $response['error'] = 1; // not such a code in valid
                $response['price'] = $price;
                $bb=$this->BuyWithCredit($price);
                if($bb){
                    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $charactersLength = strlen($characters);
                    $length=12;
                    $randomString = '';
                    for ($i = 0; $i < $length; $i++) {
                        $randomString .= $characters[rand(0, $charactersLength - 1)];
                    }
                    $generate=$user->email.'-'.$randomString;
                    QrCode::format('png')->size('600')->generate($generate, public_path().'/images/Qrfile/'.$generate.'.png');
                    $qr_address='/images/Qrfile/'.$generate.'.png';

                    $user->courses()->attach($course->id, ['paid' =>$price , 'discount_used' => '0','QRCodeData'=>$generate,'QRCodeFile'=>$qr_address]);
                }
                else{
                    $message="مشکلی در اعتبار شما به وجود آمده است، لطفا کمی بعد تلاش کنید.";
                    return view('pay-error.pay-error')->with(['message'=>$message]);
                }
                $transaction_c->condition=1;
                $transaction_c->save();
                if(\Auth::user()->invitedby){
                    $invitedby=User::find(\Auth::user()->invitedby);
                    if((! is_null($invitedby))){
                        $ress=$this->usercontroller->AdjustUserCredit($invitedby,'5');
                        if($ress){
                            $msg=new Message();
                            $msg->user_id=$invitedby->id;
                            $msg->subject='هدیه وستاکمپ به شما تعلق گرفت.';
                            $msg->text='به خاطر خرید دوست شما که دعوتش کرده بودید ۵ هزار تومان اعتبار از وستاکمپ هدیه گرفتید';
                            $msg->save();
                        }
                    }
                }
                return  view('BuyOperations.shop-cart-approval')->with(['transId'=>'پرداخت از اعتبار','course'=>$course,'price'=>$response['price']]);
            }
            else
            {
                if(!is_null($discount)) {
                    if ($discount->count <= 0 || $discount->disable == 1 || $discount->course_id!=$course->id) {
                        $response['error'] = 2; // not available as it is expired
                        $response['price'] = $price;
                        $bb=$this->BuyWithCredit($price);
                        if($bb){
                            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                            $charactersLength = strlen($characters);
                            $length=12;
                            $randomString = '';
                            for ($i = 0; $i < $length; $i++) {
                                $randomString .= $characters[rand(0, $charactersLength - 1)];
                            }
                            $generate=$user->email.'-'.$randomString;
                            QrCode::format('png')->size('600')->generate($generate, public_path().'/images/Qrfile/'.$generate.'.png');
                            $qr_address='/images/Qrfile/'.$generate.'.png';

                            $user->courses()->attach($course->id, ['paid' =>$price , 'discount_used' => '0','QRCodeData'=>$generate,'QRCodeFile'=>$qr_address]);
                        }
                        else{
                            $message="مشکلی به وجود آمده است، لطفا دوباره تلاش کنید.";
                            return view('pay-error.pay-error')->with(['message'=>$message]);
                        }
                        $transaction_c->condition=1;
                        $transaction_c->save();
                        if(\Auth::user()->invitedby){
                            $invitedby=User::find(\Auth::user()->invitedby);
                            if((! is_null($invitedby))){
                                $ress=$this->usercontroller->AdjustUserCredit($invitedby,'5');
                                if($ress){
                                    $msg=new Message();
                                    $msg->user_id=$invitedby->id;
                                    $msg->subject='هدیه وستاکمپ به شما تعلق گرفت.';
                                    $msg->text='به خاطر خرید دوست شما که دعوتش کرده بودید ۵ هزار تومان اعتبار از وستاکمپ هدیه گرفتید';
                                    $msg->save();
                                }
                            }

                        }
                        return  view('BuyOperations.shop-cart-approval')->with(['transId'=>'پرداخت از اعتبار','course'=>$course,'price'=>$response['price']]);
                    }
                    else
                    {
                        $discount->count -= 1;
                        try{
                            $discount->save();
                        }
                        catch ( \Illuminate\Database\QueryException $e){
                            return ('/courses-grid');
                        }

                        $response['error'] = 0; // there is no error
                        if ($discount->type == 0) {
                            $newprice = $price * (100-$discount->value) / 100;
                        } else {
                            $newprice = $price - $discount->value;
                        }
                        $response['price'] = $newprice;
                        $transaction_c->amount=$newprice;
                        $transaction_c->save();
                        $bb=$this->BuyWithCredit($newprice);
                        if($bb){
                            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                            $charactersLength = strlen($characters);
                            $length=12;
                            $randomString = '';
                            for ($i = 0; $i < $length; $i++) {
                                $randomString .= $characters[rand(0, $charactersLength - 1)];
                            }
                            $generate=$user->email.'-'.$randomString;
                            QrCode::format('png')->size('600')->generate($generate, public_path().'/images/Qrfile/'.$generate.'.png');
                            $qr_address='/images/Qrfile/'.$generate.'.png';

                            try{
                                $user->courses()->attach($course->id,['paid' => $newprice , 'discount_used' => $code,'QRCodeData'=>$generate,'QRCodeFile'=>$qr_address]);
                            }
                            catch ( \Illuminate\Database\QueryException $e){
                                return ('/courses-grid');
                            }
                        }
                        else{
                            $message="مشکلی به وجود آمده است، لطفا دوباره تلاش کنید.";
                            return view('pay-error.pay-error')->with(['message'=>$message]);
                        }
                        $transaction_c->condition=1;
                        $transaction_c->save();
                        if(\Auth::user()->invitedby){
                            $invitedby=User::find(\Auth::user()->invitedby);
                            if((! is_null($invitedby))){
                                $ress=$this->usercontroller->AdjustUserCredit($invitedby,'5');
                                if($ress){
                                    $msg=new Message();
                                    $msg->user_id=$invitedby->id;
                                    $msg->subject='هدیه وستاکمپ به شما تعلق گرفت.';
                                    $msg->text='به خاطر خرید دوست شما که دعوتش کرده بودید ۵ هزار تومان اعتبار از وستاکمپ هدیه گرفتید';
                                    $msg->save();
                                }
                            }

                        }
                        return  view('BuyOperations.shop-cart-approval')->with(['transId'=>'پرداخت از اعتبار','course'=>$course,'price'=>$response['price']]);

                    }
                }
                else{
                    $response['error']=10;
                    $response['price']=$price;
                    $bb=$this->BuyWithCredit($price);
                    if($bb){
                        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $charactersLength = strlen($characters);
                        $length=12;
                        $randomString = '';
                        for ($i = 0; $i < $length; $i++) {
                            $randomString .= $characters[rand(0, $charactersLength - 1)];
                        }
                        $generate=$user->email.'-'.$randomString;
                        QrCode::format('png')->size('600')->generate($generate, public_path().'/images/Qrfile/'.$generate.'.png');
                        $qr_address='/images/Qrfile/'.$generate.'.png';

                        try{
                            $user->courses()->attach($course->id,['paid' => $price , 'discount_used' => '0','QRCodeData'=>$generate,'QRCodeFile'=>$qr_address]);
                        }
                        catch ( \Illuminate\Database\QueryException $e){
                            return ('/courses-grid');
                        }
                    }
                    else{
                        $message="مشکلی به وجود آمده است، لطفا دوباره تلاش کنید.";
                        return view('pay-error.pay-error')->with(['message'=>$message]);
                    }
                    $transaction_c->condition=1;
                    $transaction_c->save();
                    if(\Auth::user()->invitedby){
                        $invitedby=User::find(\Auth::user()->invitedby);
                        if((! is_null($invitedby))){
                            $ress=$this->usercontroller->AdjustUserCredit($invitedby,'5');
                            if($ress){
                                $msg=new Message();
                                $msg->user_id=$invitedby->id;
                                $msg->subject='هدیه وستاکمپ به شما تعلق گرفت.';
                                $msg->text='به خاطر خرید دوست شما که دعوتش کرده بودید ۵ هزار تومان اعتبار از وستاکمپ هدیه گرفتید';
                                $msg->save();
                            }
                        }

                    }
                    return  view('BuyOperations.shop-cart-approval')->with(['transId'=>'پرداخت از اعتبار','course'=>$course,'price'=>$response['price']]);
                }
            }
        }
        else{
            $response['error']=0;
            $response['price']=$price;
            $bb=$this->BuyWithCredit($price);
            if($bb){
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $length=12;
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                $generate=$user->email.'-'.$randomString;
                QrCode::format('png')->size('600')->generate($generate, public_path().'/images/Qrfile/'.$generate.'.png');
                $qr_address='/images/Qrfile/'.$generate.'.png';

                $user->courses()->attach($course->id, ['paid' =>$price , 'discount_used' => '0','QRCodeData'=>$generate,'QRCodeFile'=>$qr_address]);
            }
            else{
                $message="پرداخت از اعتبار با موفقیت انجام شد ولی مشکلی به وجود آمده است لطفا با بخش  پشتیبانی تماس بگیرید.";
                return view('pay-error.pay-error')->with(['message'=>$message]);
            }
            $transaction_c->condition=1;
            $transaction_c->save();
            if(\Auth::user()->invitedby){
                $invitedby=User::find(\Auth::user()->invitedby);
                if((! is_null($invitedby))){
                    $ress=$this->usercontroller->AdjustUserCredit($invitedby,'5');
                    if($ress){
                        $msg=new Message();
                        $msg->user_id=$invitedby->id;
                        $msg->subject='هدیه وستاکمپ به شما تعلق گرفت.';
                        $msg->text='به خاطر خرید دوست شما که دعوتش کرده بودید ۵ هزار تومان اعتبار از وستاکمپ هدیه گرفتید';
                        $msg->save();
                    }
                }

            }
            return  view('BuyOperations.shop-cart-approval')->with(['transId'=>'پرداخت از اعتبار','course'=>$course,'price'=>$response['price']]);
        }
    }

    public function Finance($user)
    {
        $amount=$user->finance;
//        echo $amount;
        if(is_null($amount))
        {
            return 0;
        }
        else
        {
            return $amount->amount;
        }
    }

    public function BuyWithCredit($payment)
    {
        $user=\Auth::user();
        if($this->Finance($user) > $payment)
        {
            $finance = User::with('finance')->find($user->id);
            $finance=Finance::find($finance->finance->id);
            $finance->amount=$finance->amount-$payment;
            try{
                $finance->save();
            }
            catch ( \Illuminate\Database\QueryException $e){
                return 0;
            }
            return 1;
        }
        else
        {
            return 0;
        }

    }


    public function test(){

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $length=12;
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $generate="amin".$randomString;
        QrCode::format('png')->size('600')->generate('Make me into a QrCode!', public_path().'/images/Qrfile/'.$generate.'.png');

        $public='/images/Qrfile/'.$generate.'.png';
        $url=url($public);
        echo "<br><a href='$url'>see</a> <br>";
        return "ok"."| $randomString";
    }
}