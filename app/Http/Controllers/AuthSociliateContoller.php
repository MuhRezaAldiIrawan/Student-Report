<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\SocialAccount;
use Exception;
use Illuminate\Support\Facades\Auth;



class AuthSociliateContoller extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))->redirect();
    }

    public function handleProvideCallback($provider)
    {


        try {
            $user = Socialite::driver($provider)->User();
            dd($user);
        } catch (Exception $e) {
            dd($e->getMessage());
        }

    }

    public function findOrCreateUser($socialUser, $provider)
    {
        // Get Social Account
        $socialAccount = SocialAccount::where('provider_id', $socialUser->getId())
            ->where('provider_name', $provider)
            ->first();

        // Jika sudah ada
        if ($socialAccount) {
            // return user
            return $socialAccount->user;

            // Jika belum ada
        } else {

            // User berdasarkan email
            $user = User::where('email', $socialUser->getEmail())->first();

            // Jika Tidak ada user
            if (!$user) {
                // Create user baru
                $user = User::create([
                    'name'  => $socialUser->getName(),
                    'email' => $socialUser->getEmail()
                ]);
            }

            // Buat Social Account baru
            $user->socialAccounts()->create([
                'provider_id'   => $socialUser->getId(),
                'provider_name' => $provider
            ]);
            dd($user);

            // return user
            return $user;
        }
    }
}

