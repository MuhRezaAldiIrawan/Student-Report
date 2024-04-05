<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Dosen;
use App\Imports\MahasiswaImport;
use Maatwebsite\Excel\Facades\Excel;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Mahasiswa Data Page';

        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);


        if ($request->ajax()) {
            $data = User::with('mahasiswa')->where('role', 'Mahasiswa')->latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                            $btn =
                            '
                            <button class="btn btn-icon btn-primary btn-mahasiswa-edit" data-id="'.$row->id.'" type="button" role="button">
                                    <i class="far fa-edit"></i>
                            </button>

                            <button class="btn btn-icon btn-danger btn-mahasiswa-delete" data-id="'.$row->id.'" type="button" role="button">
                                <i class="far fa-trash-alt"></i>
                            </button>
                            ';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('pages.mahasiswa.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {

        if (!$request->ajax()) {
            redirect('/dashboard');
		}

        $title = "Edit Mahasiswa";

        $idform = "editform";

        $detail = User::find($id);

        return view('components.modal.modal_edit', compact('detail', 'title', 'idform'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            if (!$request->ajax()) {
                DB::rollBack();
                redirect('/dashboard');
            }
            DB::beginTransaction();

            $validatedData = $request->validate([
                'nama' => 'required',
                'email' => 'required|unique:users,email',
                'hp' => 'required',
                'role' => 'required',
                'password' => 'required|min:3',

            ]);
            $validatedData['password'] = Hash::make($validatedData['password']);

            $validatedDataUserDetail = $request->validate([
                'nim' => 'required',
                'kelas' => 'required',
                'prodi' => 'required',
                'jurusan' => 'required',
                'angkatan' => 'required',
                'alamat' => 'required',
                'jenis_kelamin' => 'required',
                'avatar' => 'required|image|mimes:jpeg,png,jpg',
            ]);


            $user = User::create($validatedData);

            if ($request->hasFile('avatar')) {
                $validatedDataUserDetail['avatar'] = $request->file('avatar')->store('users-avatar');
            }

            $validatedDataUserDetail['user_id'] = $user->id;

            Mahasiswa::create($validatedDataUserDetail);

            DB::commit();
            return response()->json(['code' => 200, 'success' => 'Data berhasil diimpor!']);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['code' => 400, 'error' => $e->getMessage()]);
        }

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function modalUp(Request $request)
    {
        if (!$request->ajax()) {
            redirect('/dashboard');
		}

        $title = "Tambah Mahasiswa";

        $idform = "addmahasiswa";


        return view('components.modal.modal_edit', compact('title', 'title', 'idform'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $validatedDataUser = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);


        $validatedDataUserDetail = $request->validate([
            'nim' => 'required',
            'kelas' => 'required',
            'angkatan' => 'required',
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

            $user->mahasiswa()->update($validatedDataUserDetail);

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

    public function createView(Request $request)
    {
        if (!$request->ajax()) {
            redirect('/dashboard');
        }

        $title = "Add Mahasiswa";

        $idform = "addmahasiswa";

        return view('pages.mahasiswa.add_mahasiswa', compact('title', 'title', 'idform'));
    }

    public function modalImport(Request $request)
    {
        if (!$request->ajax()) {
            redirect('/dashboard');
        }

        $title = "Import Mahasiswa";

        $action = "mahasiswa.import";

        return view('components.modal.modal_import_data', compact('title', 'action'));
    }

    public function importMahasiswa(Request $request)
    {
        if (!$request->ajax()) {
            redirect('/dashboard');
        }

        try {
            $import = new MahasiswaImport;
            $file_name = $request->file('customFile')->getClientOriginalName();
            $file_name = "MahasiswaImport" . '-' .date('YmdHis') . '-' . $file_name;
            $file_path = $request->file('customFile')->storeAs('files', $file_name);
            Excel::import($import, $file_path);


            return response()->json(['code' => 200, 'success' => 'Data berhasil diimpor!']);
        } catch (\Exception $e) {
            return response()->json(['code' => 400, 'error' => $e->getMessage()]);
        }
    }

}
