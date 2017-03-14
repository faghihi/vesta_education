<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SocialAccountService;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback(SocialAccountService $service)
    {
        $user = Socialite::driver('github')->user();
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

        $user = $service->createOrGetUser($user,'github');

        auth()->login($user);

        return redirect()->to('/home');
    }
}
