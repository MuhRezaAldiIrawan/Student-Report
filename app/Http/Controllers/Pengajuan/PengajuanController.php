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
        $data = JudulSkripsi::where('user_id', auth()->user()->id )->where('status', 'Pengajuan')->get();

        return view('pages.pengajuan.status', compact('data'));
    }

    public function listPengajuan(Request $request)
    {
        $data = User::with('dosen')->where('role', 'Dosen')->latest()->get();

        dd($data);

        if ($request->ajax()) {
            $data = User::with('dosen')->where('role', 'Dosen')->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn =
                        '
                            <button class="btn btn-icon btn-primary btn-dosen-edit" data-id="' . $row->id . '" type="button" role="button">
                                    <i class="far fa-edit"></i>
                            </button>

                            <button class="btn btn-icon btn-danger btn-dosen-delete" data-id="' . $row->id . '" type="button" role="button">
                                <i class="far fa-trash-alt"></i>
                            </button>
                            ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.dosen.index', compact('title'));
    }
}
