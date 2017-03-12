<?php
namespace App;

use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialAccount::whereProvider('google')
        ->whereProviderUserId($providerUser->getId())
        ->first();

        if ($account) {
            return $account->user;
        }
        else {
            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

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