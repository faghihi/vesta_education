<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Subscribe;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SocialController extends Controller
{

    public function Subscribe()
    {
        if(!isset($_REQUEST['Email']) ){
            return response()->json(array('msg'=>1), 200);
        }
        if($_REQUEST['Email']==""){
            return response()->json(array('msg'=>2), 200);
        }
        $Email = trim($_REQUEST['Email']);
        $sub=new Subscribe();
        $sub->email=$Email;
        try{
            $sub->save();
        }
        catch ( \Illuminate\Database\QueryException $e){
            return response()->json(array('msg'=> 4), 200);
        }
        return response()->json(array('msg'=> 3), 200);
    }

    public function StoreContact(Request $request)
    {
        //validation
        $validator = \Validator::make($request->all(), [
            'subject' => 'required|max:100|min:3',
            'message' => 'required|min:3',
            'name'=>'required|min:2',
            'email'=>'required|email',

        ],[
            'subject.min'=> 'عنوان وارد شده باید بیشتر از 3 کاراکتر داشته باشد. ',
            'message.min'=>'پیام وارد شده باید بیشتر از 3 کارکتر داشته باشد.',
            'name.min'=>'پیام وارد شده باید بیشتر از 2 کارکتر داشته باشد.',
            'name.required'=>'شما حتما باید نام را وارد کنید.',
            'subject.required'=>'شما حتما باید عنوان را وارد کنید.',
            'message.required'=>'شما حتما باید متن پیام را بنویسید.',
            'message.required'=>'شما حتما باید متن پیام را بنویسید.',
            'email.required'=>'شما حتما باید ایمیل خود را بنویسید.',


        ]);
        if ($validator->fails()) {
            return redirect('/contactUs')
                ->withErrors($validator)
                ->withInput();
        }

        $name=$request->input('name');
        $email=$request->input('email');
        $subject=$request->input('subject');
        $messages=$request->input('message');



        $message=new Contact();
        $message->name=$name;
        $message->email=$email;
        $message->subject=$subject;
        $message->message=$messages;

        try {
            $message->save();
            return redirect('/contactUs')->with(['success',' پیام شما ارسال شد  : ', 'با تشکر از شما برای ارتباط با ما ']);;
        }
        catch (\Illuminate\Database\QueryException $e) {
            return Redirect::back()->withErrors(['اشکال در سیستم:', 'خطایی در سرور پیش آمده است لطفا لحظاتی بعد مجددا تلاش بفرمایید.']);
        }
//        $rules = array(
//            'Name'      => 'Required|Min:3|Max:80',
//            'Email'     => 'Required|Between:3,64|Email',
//            'Message'   => 'Required|Min:10'
//        );
//        $validator = Validator::make($input, $rules);
//        if (! $validator->fails()) {
//            $message = new Contact();
//            $message->name = $input['Name'];
//            $message->email = $input['Email'];
//            if (isset($input['Subject']))
//                $message->subject = $input['Subject'];
//
//            $message->message = $input['Message'];
//            try{
//                $message->save();
//            }
//            catch ( \Illuminate\Database\QueryException $e){
//                return 0;
//            }
//            return 1;
//        }
//        return 0;
    }
    
    public function Contact()
    {
        $input=Input::all();
        $rules = array(
            'Name' => 'Required|Min:3|Max:80',
            'Email'     => 'Required|Between:3,64|Email',
            'Description' => 'Required|Min:20'
        );
        $messages = [
            'Name.required' => 'وارد کردن نام شما ضروری است ',
            'Email.required' => 'وارد کردن ایمیل شما ضروری است ',
            'Description.required' => 'وارد کردن توضیحات  شما ضروری است ',
            'Name.min' => 'نام کامل خود را وارد نمایید ( حداقل ۷ کاراکتر) ',
            'Email.email' => 'ایمیل معتبر نیست',
            'Description.min' => 'حداقل ۲۰ کاراکتر لازم است'
        ];
        $validator = Validator::make($input, $rules,$messages);
        if (! $validator->fails()) {
            $message = new Contact();
            $message->name = $input['Name'];
            $message->email = $input['Email'];
            if (isset($input['Subject'])) {
                $message->subject = $input['Subject'];
            }
            $message->message = $input['Description'];
            try{
                $message->save();
            }
            catch ( \Illuminate\Database\QueryException $e){
                //return redirect('/test2?Error=1');
                return redirect('/contactUs?Error=1');
            }
            //return redirect('/test2?Complete=1');
            return redirect('/contactUs?Complete=1');
        }
        else{
            //return redirect('/test2')
            return redirect('/contactUs')
                ->withErrors($validator)
                ->withInput();
        }
    }


}
