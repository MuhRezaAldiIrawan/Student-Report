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
                    ->addColumn('action', function($row){
                            $btn =
                            '
                            <button class="btn btn-icon btn-primary btn-dosen-edit" data-id="'.$row->id.'" type="button" role="button">
                                    <i class="far fa-edit"></i>
                            </button>

                            <button class="btn btn-icon btn-danger btn-dosen-delete" data-id="'.$row->id.'" type="button" role="button">
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
            ]);


            $user = User::create($validatedDataUser);

            $validatedDataUserDetail['user_id'] = $user->id;

            Dosen::create($validatedDataUserDetail);

            return response()->json(['code' => 200, 'success' => 'Data berhasil diimpor!']);


        } catch (\Exception $e) {

            return response()->json(['code' => 400, 'error' => $e->getMessage()]);

        }

    }


    public function show(Request $request,$id)
    {

        if (!$request->ajax()) {
            redirect('/dashboard');
		}

        $title = "Edit Dosen";

        $idform = "editform";

        // $detail = User::find($id);
        $detail = User::with('dosen')->where('id', $id)->first();

        return view('components.modal.modal_add', compact('detail', 'title', 'idform'));
    }


    // public function modalAdd(Request $request)
    // {
    //     if (!$request->ajax()) {
    //         redirect('/dashboard');
	// 	}

    //     $title = "Tambah Dosen";

    //     $idform = "adddosen";

    //     return view('components.modal.modal_add', compact('title', 'title', 'idform'));
    // }


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

        if ($request->hasFile('avatar')) {
            $validatedDataUserDetail['avatar'] = $request->file('avatar')->store('users-avatar');
        }


        try {
            // Update data user
            $user = User::findOrFail($request->id);
            $user->update($validatedDataUser);

            // Update data dosen yang terkait
            $user->dosen()->update($validatedDataUserDetail);

            return response()->json(['code' => 200, 'success' => 'Data berhasil diperbarui!']);
        } catch (\Exception $e) {
            return response()->json(['code' => 400, 'error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        Alert::success('Success', 'Data Dosen berhasil dihapus');
        return redirect('/dosen');
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
        $filePath = storage_path('app/public/import_tamplate/tamplate_user_data.csv');
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
            Excel::import($import, $request->file('customFile')->store('files'));

            return response()->json(['code' => 200, 'success' => 'Data berhasil diimpor!']);
        } catch (\Exception $e) {
            return response()->json(['code' => 400, 'error' => $e->getMessage()]);
        }
    }
}
