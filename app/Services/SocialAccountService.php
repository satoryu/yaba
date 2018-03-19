<?php

namespace App\Services;

use Laravel\Socialite\Contracts\User as ProviderUser;

use App\SocialAccount;
use App\User;

class SocialAccountService {
    public function findOrCreate(ProviderUser $providerUser, $provider)
    {
        $account = SocialAccount::where('provider_name', $provider)
            ->where('provider_id', $providerUser->getId())
            ->first();

        if ($account) {
            $account->avatar_url = $providerUser->getAvatar();
            $account->save();

            return $account->user;
        } else {
            $user = User::create([
                'email' => $providerUser->getEmail(),
                'name' => $providerUser->getName()
            ]);

            $user->accounts()->create([
                'provider_name' => $provider,
                'provider_id' => $providerUser->getId(),
                'avatar_url' => $providerUser->getAvatar()
            ]);

            return $user;
        }
    }
}