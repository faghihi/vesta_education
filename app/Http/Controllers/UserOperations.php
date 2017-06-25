<?php

namespace App\Http\Controllers;

use App\Finance;
use App\User;
use Validator;
//use Illuminate\Http\Request;
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
            return redirect('/profile?error=error');
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

    public function RetriveCourseHelper($user)
    {
        $courses=$user->courses;
        foreach ($courses as $course){
            $course['category_name']=$course->course->category->name;

        }
        return $courses;
    }

    public function RetrieveMyCourses()
    {
        $user=\Auth::user();
        return $this->RetriveCourseHelper($user);
    }

//    public function RetrieveMyPacks()
//    {
//        $user=\Auth::user();
//        return $user->pack_take;
//    }
//
//    public function RetrieveFaveHelper(User $user)
//    {
//        $fav=$user->fav_sections;
//        foreach($fav as $item){
//            $course=$item->courses;
//            $count = 0;
//            foreach ($course->teachers as $teacher) {
//                $section['Teacher' . $count] = $teacher;
//                $count++;
//            }
//            $item['Teacher_count'] = $count;
//            $rate_count=0;
//            $rate_value=0;
//            foreach ($item->rates as $rate){
//                $rate_count++;
//                $rate_value +=$rate->pivot->rate;
//            }
//            $item['rates_value']=$rate_value;
//            $item['rates_count']=$rate_count;
//
//        }
//
//        return $fav;
//    }


    public function Profile()
    {
        if(! \Auth::check())
            return redirect('/login');
        $user=\Auth::user();
        $courses=$user->courses;
        $packs=$user->packages;


        //Adding Finance money to profile
        $finance=$this->Finance($user);
//        return $courses;
        return view('profile.user-profile')->with(['user'=>$user,'Packs'=>$packs,'Courses'=>$courses,'Finance'=>$finance]);
    }

    public function HasFinance($user)
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

    public function AddCourse($course,$payment,$discount)
    {
        $user=\Auth::user();
        try {
            //add data to intermediate table
            $user->courses()->attach($course->id,['paid'=>$payment,'discount_used'=>$discount]);
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
            $finance=new Finance();
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
