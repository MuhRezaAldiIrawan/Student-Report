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
}
