<?php
/**
 * Created by PhpStorm.
 * User: DaoDieuHoa
 * Date: 09/02/2016
 * Time: 2:33 PM
 */

namespace App\Repositories;

use App\Profile;
use App\User;
use Laravel\Socialite\Contracts\User as ProviderUser;

class ProfileRepository {
    public function createOrGetUser(ProviderUser $providerUser) {
        $account = Profile::whereProvider(Profile::PRV_FACEBOOK)
            ->whereUid($providerUser->getId())->first();

        if ($account) {
            return $account->user;
        } else {
            $account = new Profile;
            $account->uid = $providerUser->getId();
            $account->provider = Profile::PRV_FACEBOOK;
            $account->access_token = $providerUser->token;
            $account->access_token_secret = '';
            $account->refresh_token = $providerUser->refreshToken;
            $account->expires_in = $providerUser->expiresIn;
            $account->nickname = $providerUser->nickname;
            $account->name = $providerUser->name;
			$account->email = $providerUser->email;
			$account->avatar = $providerUser->avatar;
			$account->avatar_original = $providerUser->avatar_original;

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'display_name' => $providerUser->getName(),
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }

}