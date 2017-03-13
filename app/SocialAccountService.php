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
            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $provider,
            ]);
            if (!$user) {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'activated'=> 1,
                    'image'=>$providerUser->getAvatar(),
                    'mobile'=>'00000000',
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;

        }
    }
}