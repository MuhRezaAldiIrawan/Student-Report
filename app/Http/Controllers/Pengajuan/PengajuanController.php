<?php

namespace App\Http\Controllers\Pengajuan;

use App\Http\Controllers\Controller;
use App\Models\JudulSkripsi;
use App\Models\LogApproval;
use App\Models\LogProposal;
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

            $judul = JudulSkripsi::create($validateForm);

            $logs = LogProposal::create([
                'judul_skripsi_id' => $judul->id,
                'user_id' => auth()->user()->id,
                'status' => 'Pengajuan',

            ]);

            $logs->save();

            return response()->json(['code' => 200, 'success' => 'Data berhasil diimpor!']);
        } catch (\Exception $e) {
            return response()->json(['code' => 400, 'error' => $e->getMessage()]);
        }
    }

    public function statusProposal()
    {
        $data = JudulSkripsi::where('user_id', auth()->user()->id)->get();

        $userdata = User::with('mahasiswa')->find(auth()->user()->id);

        $logs = LogProposal::where('user_id', auth()->user()->id)->get();


        return view('pages.pengajuan.status', compact('data', 'userdata', 'logs'));
    }

    public function listPengajuan(Request $request)
    {

        if ($request->ajax()) {
            $data = JudulSkripsi::with('user')->where('status', 'Pengajuan')->latest()->get();
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

        $userdata = User::with('mahasiswa')->find($data->user_id);

        // dd($userdata);

        return view('pages.pengajuan.detail', compact('data', 'userdata'));
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
            // dd($data);

            $data->status = 'Diterima';
            $data->save();


            $data = LogProposal::create([
                'judul_skripsi_id' => $id,
                'user_id' => $data->user_id,
                'status' => 'Diterima',
            ]);
            $data->save();


            return response()->json(['code' => 200, 'success' => 'Proposal telah berhasil diterima']);

        } catch (\Exception $e) {

            return response()->json(['code' => 400, 'error' => $e->getMessage()]);
        }
    }

    public function rejectPegajuan($id)
    {
        try {

            $data = JudulSkripsi::find($id);

            $data->status = 'Ditolak';
            $data->save();


            $data = LogProposal::create([
                'judul_skripsi_id' => $id,
                'user_id' => $data->user_id,
                'status' => 'Ditolak',
            ]);
            $data->save();


            return response()->json(['code' => 200, 'success' => 'Proposal Ditolak']);

        } catch (\Exception $e) {

            return response()->json(['code' => 400, 'error' => $e->getMessage()]);
        }
    }

    public function listProposalDiterima(Request $request)
    {
        $title = "Proposal Diterima";

        if ($request->ajax()) {
            $data = JudulSkripsi::with('user')->where('status', 'Diterima')->latest()->get();
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
        return view('pages.pengajuan.diterima',compact('title'));
    }

    public function listProposalDitolak(Request $request)
    {
        $title = "Proposal Ditolak";

        if ($request->ajax()) {
            $data = JudulSkripsi::with('user')->where('status', 'Ditolak')->latest()->get();
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
        return view('pages.pengajuan.ditolak', compact('title'));
    }

    public function assignPembimbing(Request $request, $id)
    {

        if (!$request->ajax()) {
            redirect('/dashboard');
        }

        $data = JudulSkripsi::find($id);
        $dataDosen = User::where('role', 'Dosen')->get();

        return view('components.modal.assign', compact('data', 'dataDosen'));
    }

    public function updatePembimbing(Request $request)
    {

        if (!$request->ajax()) {
            redirect('/dashboard');
        }

        try {

            $data = JudulSkripsi::find($request->id);

            $data->pbb_1_dosen_id = $request->pbb1;
            $data->pbb_2_dosen_id = $request->pbb2;
            $data->save();

            return response()->json(['code' => 200, 'success' => 'Data berhasil diperbarui!']);

        } catch (\Throwable $th) {

            return response()->json(['code' => 400, 'error' => $th->getMessage()]);

        }

    }

}
