<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $title = 'User Page';
        return view('pages.user.index', compact('title'));
    }
    public function userSetting()
    {
        $title = 'User Setting Page';
        return view('pages.user.users-settings', compact('title'));
    }

    public function userUpdate(Request $request) {

        // dd(auth()->user()->id);
        $updateuser = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'role' => 'required',
            'phone' => 'required|max:255',
            'address' => 'required|max:255',
            'gender' => 'required',
            'avatar' => 'image|file',
        ]);

        if ($request->file('avatar')) {
            $updateuser['avatar'] = $request->file('avatar')->store('users-avatar');        }


        User::where('id', auth()->user()->id)->update($updateuser);

        return redirect('/user-profile');

    }
}
