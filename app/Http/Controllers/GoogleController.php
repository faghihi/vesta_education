<?php

namespace App\Http\Controllers;

use App\SocialAccount;
use App\User;
use Illuminate\Http\Request;
use App\SocialAccountService;
use Illuminate\Support\Facades\Input;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Contracts\User as ProviderUser;

class GoogleController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback(SocialAccountService $service)
    {
        $user = Socialite::driver('google')->user();
//        $token = $user->token;
//        $refreshToken = $user->refreshToken; // not always provided
//        $expiresIn = $user->expiresIn;

// OAuth One Providers
//        $token = $user->token;
//        $tokenSecret = $user->tokenSecret

// All Providers
//        $user->getId();
//        $user->getNickname();
//        $user->getName();
//        $user->getEmail();
//        $user->getAvatar();
        $user = $service->createOrGetUser($user,'google');
        if(! $user){
            return redirect('/getmobile');
        }
        auth()->login($user);

        return redirect()->to('/home');
    }

    public function Complete()
    {
        $input=Input::all();
        $rules = array(
            'phone' => 'required|max:11|min:11|regex:/(09)[0-9]{9}/'
        );
        $messages = [
            'mobile.required'   => 'موبایل الزامی است.',
            'mobile.min'        => 'موبایل شما معتبر نیست.',
            'mobile.regex' =>'فرمت شماره تماس درست نیست از فرمت مثالی ۰۹۳۰۱۱۰۱۰۱۰ استفاده نمایید.'
        ];
        $validator = \Validator::make($input, $rules,$messages);
        if ($validator->fails()) {
            return redirect('/getmobile')
                ->withErrors($validator)
                ->withInput();
        }
        else{
            $providerUser=\Session::get('user_social');
            $provider=\Session::get('provider');
            $mobile=Input::get('phone');
            $this->storeuser($providerUser,$provider,$mobile);
            return redirect('/home');
        }
    }

    public function storeuser(ProviderUser $providerUser,$provider,$mobile)
    {
        $account = new SocialAccount([
            'provider_user_id' => $providerUser->getId(),
            'provider' => $provider,
        ]);
        if(!$providerUser->getName())
        {
            $name=$providerUser->getNickname();
        }
        else{
            $name=$providerUser->getName();
        }
        $user = User::create([
            'email' => $providerUser->getEmail(),
            'name' =>$name,
            'activated'=> 1,
            'image'=>$providerUser->getAvatar(),
            'mobile'=>$mobile,
        ]);

        $account->user()->associate($user);
        $account->save();
        \Session::forget('provider');
        \Session::forget('user_social');
        \Session::forget('mobile');
        auth()->login($user);
    }
}