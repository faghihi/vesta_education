<?php
namespace App\Http\Controllers\Auth;
use App\Finance;
use App\Invite;
use App\User;
use Illuminate\Support\Facades\Input;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\ActivationService;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use RegistersUsers;
    protected $activationService;
    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/profile';


    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $key=0;
        if(Input::has('key')){
            $key=Input::get('key');
        }
        return view('auth.register')->with('key',$key);
    }





    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ActivationService $activationService)
    {
        $this->middleware('guest');
        $this->activationService = $activationService;
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $message = array(
            'name.required' => 'لطفا نام معتبری وارد نمایید' ,
            'name.max' => 'نام شما بیش از حد طولانی می باشد ',
            'email.required'=>'ایمیل الزامی می باشد .',
            'email.email'=>'ایمیل شما معتبر نیست',
            'email.unique'=>'ایمیل قبلا توسط شخص دیگری ثبت شده است',
            'password.required'=>'رمز عبور ضروری میباشد ',
            'password.min'=>'حداقل طول پسورد ۶ است ',
            'password.confirmed'=>'رمز و تایید آن  مطابقت ندارند',
            'mobile.required'   => 'موبایل الزامی است.',
            'mobile.min'        => 'موبایل شما معتبر نیست.',
            'mobile.regex' =>'فرمت شماره تماس درست نیست از فرمت مثالی ۰۹۳۰۱۱۰۱۰۱۰ استفاده نمایید.'
        );
        return Validator::make($data, [
            'name'      => 'required|max:255',
            'email'     => 'required|email|max:255|unique:users',
            'password'  => 'required|min:6|confirmed',
            'mobile'    => 'required|max:11|min:11|regex:/(09)[0-9]{9}/'
        ],$message);
    }
    public function register(Request $request)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $user = $this->create($request->all());
        $this->activationService->sendActivationMail($user);
        return redirect('/login')->with('status', 'ایمیل فعال سازی برای شما ارسال گشت .');
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        if(isset($data['key'])){
            $invitedby=Invite::where('invite_code',$data['key'])->first();
            if(! is_null($invitedby)){
                $invitedbyuser=$invitedby->user_id;
                $key=Input::get('key');
                $invitedby=Invite::find($invitedby->id);
                $invitedby->status=1;
                $invitedby->save();
            }
            else{
                $invitedbyuser=null;
                $key=null;
            }
            $user =  User::create([
                'name'      => $data['name'],
                'email'     => $data['email'],
                'mobile'    => $data['mobile'],
                'password'  => bcrypt($data['password']),
                'invetecode'=>$key,
                'invitedby'=>$invitedbyuser
            ]);
            Finance::create([
                'amount'      => 0,
                'user_id'     => $user->id
            ]);
        }
        else{
            $user =  User::create([
                'name'      => $data['name'],
                'email'     => $data['email'],
                'mobile'    => $data['mobile'],
                'password'  => bcrypt($data['password']),
            ]);
            Finance::create([
                'amount'      => 0,
                'user_id'     => $user->id
            ]);
        }
        return $user;

    }
}