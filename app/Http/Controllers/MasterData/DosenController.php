<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportUser;
use App\Models\Dosen;
use Illuminate\Support\Facades\Hash;
use App\Models\Mahasiswa;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $title = 'Dosen Data Page';

        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);


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

    public function createView(Request $request)
    {

        if (!$request->ajax()) {
            redirect('/dashboard');
        }

        $title = "Add Dosen";

        $idform = "adddosen";

        return view('pages.dosen.add_dosen', compact('title', 'title', 'idform'));
    }


    public function store(Request $request)
    {
        try {


            $validatedDataUser = $request->validate([
                'nama' => 'required',
                'email' => 'required|unique:users,email',
                'hp' => 'required',
                'role' => 'required',
                'password' => 'required|min:3',
            ]);

            $validatedDataUser['password'] = Hash::make($validatedDataUser['password']);

            $validatedDataUserDetail = $request->validate([
                'nidn' => 'required',
                'alamat' => 'required',
                'jenis_kelamin' => 'required',
                'prodi' => 'required',
                'jurusan' => 'required',
                'avatar' => 'required|image|mimes:jpeg,png,jpg',
            ]);


            $user = User::create($validatedDataUser);

            if ($request->hasFile('avatar')) {
                $validatedDataUserDetail['avatar'] = $request->file('avatar')->store('users-avatar');
            }

            $validatedDataUserDetail['user_id'] = $user->id;

            Dosen::create($validatedDataUserDetail);

            return response()->json(['code' => 200, 'success' => 'Data berhasil diimpor!']);
        } catch (\Exception $e) {

            return response()->json(['code' => 400, 'error' => $e->getMessage()]);
        }
    }


    public function show(Request $request, $id)
    {

        if (!$request->ajax()) {
            redirect('/dashboard');
        }

        $title = "Edit Dosen";

        $detail = User::with('dosen')->where('id', $id)->first();

        return view('components.modal.modal_edit', compact('detail', 'title'));
    }


    public function update(Request $request)
    {

        $validatedDataUser = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);


        $validatedDataUserDetail = $request->validate([
            'nidn' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg',
        ]);


        try {

            $user = User::findOrFail($request->id);
            if ($request->hasFile('avatar')) {
                $validatedDataUserDetail['avatar'] = $request->file('avatar')->store('users-avatar');
            }

            $user->update($validatedDataUser);

            $user->dosen()->update($validatedDataUserDetail);

            return response()->json(['code' => 200, 'success' => 'Data berhasil diperbarui!']);
        } catch (\Exception $e) {
            return response()->json(['code' => 400, 'error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {

        try {
            DB::beginTransaction();

            $user = User::findOrFail($id);

            if ($user->role == 'Dosen') {

                Dosen::where('user_id', $user->id)->delete();
            } elseif ($user->role == 'Mahasiswa') {

                Mahasiswa::where('user_id', $user->id)->delete();
            }

            $user->delete();

            DB::commit();

            return response()->json(['code' => 200, 'message' => 'User berhasil dihapus!']);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json(['code' => 400, 'message' => 'Gagal menghapus user: ' . $e->getMessage()]);
        }
    }

    public function modalImport(Request $request)
    {
        if (!$request->ajax()) {
            redirect('/dashboard');
        }

        $title = "Import Dosen";

        $action = "dosen.import";

        return view('components.modal.modal_import_data', compact('title', 'action'));
    }

    public function downloadTamplate()
    {
        $filePath = storage_path('app/public/import_tamplate/tamplate_import_dosen.csv');
        $fileName = 'template_user_data.csv';

        if (!file_exists($filePath)) {
            abort(404);
        }

        return response()->download($filePath, $fileName);
    }

    public function importDosen(Request $request)
    {
        if (!$request->ajax()) {
            redirect('/dashboard');
        }

        try {
            $import = new ImportUser;
            $file_name = $request->file('customFile')->getClientOriginalName();
            $file_name = "DosenImport" . '-' .date('YmdHis') . '-' . $file_name;
            $file_path = $request->file('customFile')->storeAs('files', $file_name);
            Excel::import($import, $file_path);

            return response()->json(['code' => 200, 'success' => 'Data berhasil diimpor!']);
        } catch (\Exception $e) {
            return response()->json(['code' => 400, 'error' => $e->getMessage()]);
        }
    }
}
