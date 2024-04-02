<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function profile()
    {

        return view('pages.user.profile');
    }

    public function userSetting()
    {
        return view('pages.user.setting');
    }

    public function userUpdate(Request $request){

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
