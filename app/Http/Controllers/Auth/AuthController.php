<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        $title = 'Login Page';
        return view('pages.auth.login', compact('title'));
    }

    public function register()
    {
        $title = 'Register Page';
        return view('pages.auth.register', compact('title'));
    }

    public function register_action(Request $request) {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:3',

        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        toast('You\'ve Successfully Registered','success');
        return redirect('/');
    }


    public function login_action(Request $request)
    {

        $login = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($login)) {
            $request->session()->regenerate();
            toast('You\'ve Successfully Login','success');
            return redirect()->intended('/dashboard');
        }
        return back()->with('loginError', 'Login Failed');
    }


    public function logout(Request $request) : RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        toast('You\'ve Successfully Logout','success');
        return redirect('/');
    }



}
