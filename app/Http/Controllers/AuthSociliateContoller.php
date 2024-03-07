<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;





class AuthSociliateContoller extends Controller
{

    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleProvideCallback()
    {
        $user = Socialite::driver('google')->user();
        dd($user);
    }

}

