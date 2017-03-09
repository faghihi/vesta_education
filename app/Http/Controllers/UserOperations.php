<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class UserOperations extends Controller
{
    public function ChangePass()
    {
        $input=Input::all();
        if(!Input::has('oldpass')|| !Input::has('newpass')){
            return redirect('/profile?error=noinfo');
//            return 0;
        }
        $user=\Auth::user();
        if(!password_verify(Input::get('oldpass'),$user->password))
            return redirect('/profile?error=mismatch');
        $rules = array(
            'newpass' => 'required|min:6',
        );
        $messages=[
            'newpass.required'=>'رمز عبور ضروری میباشد ',
            'newpass.min'=>'حداقل طول پسورد ۶ است ',
        ];
        $validator = Validator::make($input, $rules,$messages);
        if($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $user->password=bcrypt(Input::get('newpass'));
        try{
            $user->save();
        }
        catch ( \Illuminate\Database\QueryException $e){
            return redirect('/profile?error=error');
        }
        return redirect('/profile?success=1');
    }

    public function UploadPhoto()
    {
        if (Input::hasFile('image')) {
            $file = array('image' => Input::file('image'));
            $rules = array('image' => 'required|max:100000|mimes:jpeg,JPEG,PNG,png');
            $messages=[
                'image.required'=>'آپلود تصویر اجباری است ',
                'image.max'=>'حجم فایل بسیار زیاد است ',
                'image.mimes'=>'فرمت فایل شما ساپورت نمیشود.',
            ];
            $validator = Validator::make($file, $rules,$messages);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            if (Input::file('image')->isValid()) {
                $destinationPath = 'uploads/'.\Auth::id(); // upload path
                $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension; // renameing image
                Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
                $user=\Auth::user();
                $user->image=$destinationPath.'/'.$fileName;
                try{
                    $user->save();
                }
                catch ( \Illuminate\Database\QueryException $e){
                    return redirect('/profile?error=error');
                }
                return redirect('/profile?success=1');
            }
            else {
                return redirect('/profile?error=error');
            }
        }
        else
            return 0;
    }

    public function ChangeInfo()
    {
        if(! \Auth::check())
            return response()->json(array('msg'=> 1), 200);
        $user = \Auth::user();
        if (Input::has('Name') && Input::has('Mobile')) {
            $user->name = Input::get('Name');
            $user->mobile=Input::get('Mobile');
            try{
                $user->save();
            }
            catch ( \Illuminate\Database\QueryException $e){
                return response()->json(array('msg'=> 2), 200);
            }
            return response()->json(array('msg'=> 3), 200);
        }
        else
            return response()->json(array('msg'=> 2), 200);
    }

    public function RetriveCourseHelper(User $user)
    {
        $courses=$user->courses;
        foreach ($courses as $course){
            $counter=$course->category->name;

        }
        return $courses;
    }

    public function RetrieveMyCourses()
    {
        $user=\Auth::user();
        return $this->RetriveCourseHelper($user);
    }

    public function RetrieveMyPacks()
    {
        $user=\Auth::user();
        return $user->pack_take;
    }

    public function RetrieveFaveHelper(User $user)
    {
        $fav=$user->fav_sections;
        foreach($fav as $item){
            $course=$item->courses;
            $count = 0;
            foreach ($course->teachers as $teacher) {
                $section['Teacher' . $count] = $teacher;
                $count++;
            }
            $item['Teacher_count'] = $count;
            $rate_count=0;
            $rate_value=0;
            foreach ($item->rates as $rate){
                $rate_count++;
                $rate_value +=$rate->pivot->rate;
            }
            $item['rates_value']=$rate_value;
            $item['rates_count']=$rate_count;

        }

        return $fav;
    }
    public function RetrieveFave()
    {
        $user=\Auth::user();
        return $this->RetrieveFaveHelper($user);
    }

    public function Cooperate()
    {
        $rules = array(
            'Name' => 'required|min:7',
            'Email' => 'required|Email',
            'Description' => 'required|min:20',
            'Telephone'=>'required'
        );
        $messages = [
            'Name.required' => 'وارد کردن نام شما ضروری است ',
            'Email.required' => 'وارد کردن ایمیل شما ضروری است ',
            'Description.required' => 'وارد کردن توضیحات  شما ضروری است ',
            'Telephone.required' => 'وارد کردن شماره تماس شما ضروری است ',
            'Name.min' => 'نام کامل خود را وارد نمایید ( حداقل ۷ کاراکتر) ',
            'Email.Email' => 'ایمیل معتبر نیست',
            'Description.min' => 'حداقل ۲۰ کاراکتر لازم است'
        ];
        $input=Input::all();
        $validator = Validator::make($input, $rules,$messages);
        if($validator->fails()){
            return redirect('/cooperate')
                ->withErrors($validator)
                ->withInput();
        }
        $Co=New Cooperate();
        $Co->name=$input['Name'];
        $Co->email=$input['Email'];
        $Co->description=$input['Description'];
        $Co->phone=$input['Telephone'];
        if (Input::hasFile('Resume')) {
            $file = array('Resume' => Input::file('Resume'));
            $rules = array('Resume' => 'required|max:1000000|mimes:pdf,PDF,docx');
            $messages = [
                'Resume.required' => 'رزومه شما اجباری است  ',
                'Resume.max' => 'فایل شما از حداکثر مجاز بیشتر است ',
                'Resume.mimes' => 'تایپ های مورد قبول تنها pdf و docx است .',
            ];
            $validator = Validator::make($file, $rules,$messages);
            if ($validator->fails()) {
                return redirect('/cooperate')
                    ->withErrors($validator)
                    ->withInput();
            }
            if (Input::file('Resume')->isValid()) {
                $destinationPath = 'uploads'; // upload path
                $extension = Input::file('Resume')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension; // renameing image
                Input::file('Resume')->move($destinationPath, $fileName); // uploading file to given path
                $Co->resume_link=$destinationPath.'/'.$fileName;
                try{
                    $Co->save();
                }
                catch ( \Illuminate\Database\QueryException $e){
                    return view('instructor.addInstructor')->with('error','2');
                }
            }
            else {
                return view('instructor.addInstructor')>with('error','2');
            }
        }
        if (Input::hasFile('Sample')) {
            $file = array('Sample' => Input::file('Sample'));
            $rules = array('Sample' => 'required|max:10000000|mimes:mp4,mkv');
            $messages = [
                'Sample.required' => 'نمونه کار  شما اجباری است  ',
                'Sample.max' => 'فایل شما از حداکثر مجاز بیشتر است ',
                'Sample.mimes' => 'تایپ های مورد قبول تنها mp4,mkv است .',
            ];
            $validator = Validator::make($file, $rules,$messages);
            if ($validator->fails()) {
                return redirect('/cooperate')
                    ->withErrors($validator)
                    ->withInput();
            }
            if (Input::file('Sample')->isValid()) {
                $destinationPath = 'uploads'; // upload path
                $extension = Input::file('Sample')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension; // renameing image
                Input::file('Sample')->move($destinationPath, $fileName); // uploading file to given path
                $Co->sample_link=$destinationPath.'/'.$fileName;
                try{
                    $Co->save();
                }
                catch ( \Illuminate\Database\QueryException $e){
                    return view('instructor.addInstructor')->with('error','2');
                }
                return view('instructor.addInstructor')->with('complete','1');

            }
            else {
                return view('instructor.addInstructor')->with('error','2');
            }
        }
        try{
            $Co->save();
        }
        catch ( \Illuminate\Database\QueryException $e){
            return view('instructor.addInstructor')->with('error','2');
        }
        return view('instructor.addInstructor')->with('complete','1');

    }

    public function Profile()
    {
        if(! \Auth::check())
            return redirect('/login');
        $user=\Auth::user();
        $courses=$user->courses_take;
        $packs=$user->pack_take;
        foreach($packs as $pack){
            $pack['end']=jDateTime::strftime('d-m-Y', strtotime($pack->pivot->end));
            $pack['start']=jDateTime::strftime('d-m-Y', strtotime($pack->pivot->start));
        }
        foreach ($courses as $course){
            $counter11=$course->provider;
            $course['Teachers']="";
            $counter=0;
            foreach ($course->teachers as $teacher){
                if($counter)
                    $course['Teachers']=$course['Teachers'].",".$teacher->name;
                else
                    $course['Teachers']=$teacher->name;
                $counter++;
            }
            $counter1=0;

            $rate_count=0;
            $rate_value=0;
            foreach ($course->rates as $rate){
                $rate_count++;
                $rate_value +=$rate->pivot->rate;
            }
            $count=0;
            $time=0;
            foreach ($course->section as $section){
                $count++;
                $time+=$section->time;
            }
            $course['sections_time']=$time;
            $course['sections_count']=$count;
            $course['rates_value']=$rate_value;
            $course['rates_count']=$rate_count;
            $counter=$course->category->name;
        }
        $finance=$this->Finance($user);
//        return $courses;
        return view('profile.user-profile')->with(['user'=>$user,'Packs'=>$packs,'Courses'=>$courses,'Finance'=>$finance]);
    }

    public function HasFinance(User $user)
    {
        $amount=$user->finance;
//        echo $amount;
        if(is_null($amount))
        {
            return -1;
        }
        else
        {
            return 1;
        }
    }

    public function Finance(User $user)
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

    public function AddCourse(Course $course,$payment,$discount)
    {
        $user=\Auth::user();
        try {
            $user->courses_take()->attach($course->id,['paid'=>$payment,'discunt_used'=>$discount]);
        }
        catch ( \Illuminate\Database\QueryException $e){

            return 0;
        }

        return 1;

    }

    public function BuyWithCredit($payment)
    {
        $user=\Auth::user();
        if($this->Finance($user) > $payment)
        {
            $finance = User::with('finance')->find($user->id);
            $finance->finance->amount=$finance->finance->amount-$payment;
            try{
                $finance->push();
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

    public function AdjustCredit($payment)
    {
        $user=\Auth::user();
        if($this->HasFinance($user)!=-1)
        {
            $finance = User::with('finance')->find($user->id);
            $finance->finance->amount=$finance->finance->amount+$payment;
            try{
                $finance->push();
            }
            catch ( \Illuminate\Database\QueryException $e){
                return 0;
            }
            return 1;
        }
        else
        {
            $finance=new UserFinance();
            $finance->amount=$payment;
            $finance->user_id=$user->id;
            try{
                $finance->save();
            }
            catch ( \Illuminate\Database\QueryException $e){
                return 0;
            }
            return 1;
        }

    }
}
