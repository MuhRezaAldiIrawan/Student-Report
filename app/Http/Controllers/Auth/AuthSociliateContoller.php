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
        return Socialite::driver($provider)->redirect();
    }

    public function handleProvideCallback($provider)
    {
        $github_client_token = env('GITHUB_CLIENT_TOKEN');

        try {
            if ($provider == 'github') {

                $user = Socialite::driver($provider)->userFromToken($github_client_token);
            } elseif ($provider == 'google') {
                $user = Socialite::driver($provider)->user();
            } elseif ($provider == 'twitter') {
                dd($user = Socialite::driver($provider)->user());
            }
        } catch (Exception $e) {

            return redirect()->back();
        }

        $authUser = $this->findOrCreateUser($user, $provider);

        Auth::login($authUser, true);


        return redirect()->route('dashboard');
    }

    public function findOrCreateUser($socialUser, $provider)
    {
        // Get Social Account
        $socialAccount = SocialAccount::where('provider_id', $socialUser->getId())
            ->where('provider_name', $provider)
            ->first();


        if ($socialAccount) {
            return $socialAccount->user;

        } else {

            $user = User::where('email', $socialUser->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'name'  => $socialUser->getName(),
                    'email' => $socialUser->getEmail()
                ]);
            }

            $user->socialAccounts()->create([
                'provider_id'   => $socialUser->getId(),
                'provider_name' => $provider
            ]);

            return $user;
        }
    }
}
