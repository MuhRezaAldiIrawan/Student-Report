<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;


class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:3',

        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);


        // dd($request);
        User::create($validatedData);
        Alert::toast('You\'ve Successfully Registered', 'success');
        return redirect('/');
    }


}
