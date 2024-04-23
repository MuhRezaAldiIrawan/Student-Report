<?php

namespace App\Http\Controllers\Pengajuan;

use App\Http\Controllers\Controller;
use App\Models\JudulSkripsi;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\User;

class PengajuanController extends Controller
{
    public function index()
    {
        $check = JudulSkripsi::where('user_id', auth()->user()->id)->first();

        return view('pages.pengajuan.index', compact('check'));
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

    public function statusProposal()
    {
        $data = JudulSkripsi::where('user_id', auth()->user()->id)->where('status', 'Pengajuan')->get();

        return view('pages.pengajuan.status', compact('data'));
    }

    public function listPengajuan(Request $request)
    {

        if ($request->ajax()) {
            $data = JudulSkripsi::with('user')->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn =
                        '<a href="/pengajuan_detail/' . $row->id . '">
                            <button class="btn btn-primary m-r-5 btn-dosen-detail">Detail</button>
                        </a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.pengajuan.list');
    }

    public function pengajuanDetail($id)
    {
        $data = JudulSkripsi::with('user')->find($id);

        return view('pages.pengajuan.detail', compact('data'));
    }

    public function downloadProposal($id)
    {
        $data = JudulSkripsi::find($id);
        $filePath = storage_path('app/public/' . $data->file);

        if (!file_exists($filePath)) {
            abort(404);
        }

        return response()->download($filePath);
    }

    public function approvePegajuan($id)
    {

        try {

            $data = JudulSkripsi::find($id);
            $data->status = 'Diterima';
            $data->save();
            return response()->json(['code' => 200, 'success' => 'Proposal telah berhasil diterima']);

        } catch (\Exception $e) {

            return response()->json(['code' => 400, 'error' => $e->getMessage()]);
        }
    }
}
