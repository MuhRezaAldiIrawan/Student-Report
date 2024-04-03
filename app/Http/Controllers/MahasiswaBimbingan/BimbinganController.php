<?php

namespace App\Http\Controllers\MahasiswaBimbingan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BimbinganController extends Controller
{
    public function index()
    {

        $title = "Mahasiswa Bimbingan Dosen";
        return view('pages.bimbingan.index', compact('title'));

    }
}
