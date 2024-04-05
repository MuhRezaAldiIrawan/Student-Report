<?php

namespace App\Http\Controllers\MahasiswaBimbingan;

use App\Http\Controllers\Controller;
use App\Models\JudulSkripsi;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class BimbinganController extends Controller
{
    public function index()
    {
        $title = "Mahasiswa Bimbingan Dosen";

        $mahasiswa = Mahasiswa::with('user')->get();

        $jumlahBimbingan = JudulSkripsi::where('pbb_1_dosen_id', auth()->user()->id || 'pbb_2_dosen_id', auth()->user()->id)->count();

        return view('pages.bimbingan.index', compact('title', 'mahasiswa', 'jumlahBimbingan'));

    }

}
