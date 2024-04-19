<?php

namespace App\Http\Controllers\Pengajuan;

use App\Http\Controllers\Controller;
use App\Models\JudulSkripsi;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index()
    {
        return view('pages.pengajuan.index');
    }

    public function store(Request $request)
    {
        try {

            $validateForm = $request->validate([
                'user_id' => 'required',
                'judul' => 'required',
                'deskripsi' => 'required',
                'file' => 'required',
            ]);

            if ($request->file('file')) {
                $validateForm['file'] = $request->file('file')->storeAs('file-judul-pengajuan', $request->file('file')->getClientOriginalName());
            }

            JudulSkripsi::create($validateForm);

            return response()->json(['code' => 200, 'success' => 'Data berhasil diimpor!']);


        } catch (\Exception $e) {
            return response()->json(['code' => 400, 'error' => $e->getMessage()]);
        }
    }
}
