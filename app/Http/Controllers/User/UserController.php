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
        $data = User::with('dosen', 'mahasiswa')->find(auth()->user()->id);

        return view('pages.user.setting', compact('data'));
    }


}
