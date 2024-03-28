<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

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
            $data = User::where('role', 'Mahasiswa')->latest()->get();
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

        return view('components.modal.modal_add', compact('detail', 'title', 'idform'));
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

            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required|min:3',
                'address' => 'required',
                'phone' => 'required',
                'role' => 'required',
                'gender' => 'required',
                'avatar' => 'image|file|mimes:jpeg,png,jpg,svg',

            ]);

            if ($request->file('avatar')) {
                $validatedData['avatar'] = $request->file('avatar')->store('users-avatar');
            }

            User::create($validatedData);

            return response()->json(['code' => 200, 'success' => 'Data berhasil diimpor!']);

        } catch (\Exception $e) {

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


        return view('components.modal.modal_add', compact('title', 'title', 'idform'));
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

        $updateuser = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'address' => 'required|max:255',
            'phone' => 'required|max:255',
            'gender' => 'required',
            'avatar' => 'image|file',
        ]);

        if ($request->file('avatar')) {
            $updateuser['avatar'] = $request->file('avatar')->store('users-avatar');
        }


        User::where('id', $request->id)->update($updateuser);

        return redirect('/mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

        $title = "Import Mahasiswa";

        $action = "mahasiswa.import";

        return view('components.modal.modal_import_data', compact('title', 'action'));
    }
}
