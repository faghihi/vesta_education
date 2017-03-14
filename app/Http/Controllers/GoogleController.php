<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SocialAccountService;
use Laravel\Socialite\Facades\Socialite;

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
//        $tokenSecret = $user->tokenSecret;

// All Providers
//        $user->getId();
//        $user->getNickname();
//        $user->getName();
//        $user->getEmail();
//        $user->getAvatar();

        $user = $service->createOrGetUser($user,'google');

        auth()->login($user);

        return redirect()->to('/home');
    }
}