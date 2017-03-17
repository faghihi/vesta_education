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
        $Email = $_REQUEST['Email'];
        $sub=new Subscribe();
        $sub->email=$Email;
        try{
            $sub->save();
        }
        catch ( \Illuminate\Database\QueryException $e){
            return response()->json(array('msg'=> 2), 200);
        }
        return response()->json(array('msg'=> 3), 200);
    }

    public function StoreContact($input)
    {
        $rules = array(
            'Name'      => 'Required|Min:3|Max:80',
            'Email'     => 'Required|Between:3,64|Email',
            'Message'   => 'Required|Min:10'
        );
        $validator = Validator::make($input, $rules);
        if (! $validator->fails()) {
            $message = new Contact();
            $message->name = $input['Name'];
            $message->email = $input['Email'];
            if (isset($input['Subject']))
                $message->subject = $input['Subject'];

            $message->message = $input['Message'];
            try{
                $message->save();
            }
            catch ( \Illuminate\Database\QueryException $e){
                return 0;
            }
            return 1;
        }
        return 0;
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
