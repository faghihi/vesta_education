<?php
namespace App;

use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAccountService
{
    public function createOrGetUser(ProviderUser $providerUser,$provider)
    {
        $account = SocialAccount::whereProvider($provider)
        ->whereProviderUserId($providerUser->getId())
        ->first();
        $user = User::whereEmail($providerUser->getEmail())->first();
        if ($account) {
            return $account->user;
        }
        elseif($user){
            return $user;
        }
        else {
            \Session::put('user_social',$providerUser);
            \Session::put('provider',$provider);
            return 0;
        }
    }
}