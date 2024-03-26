<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Namshi\JOSE\Signer\OpenSSL\RSA;

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
            $data = User::where('role', 'dosen')->latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                            $btn =
                            '
                            <button class="btn btn-icon btn-primary btn-outlet-edit" data-id="'.$row->id.'" type="button" role="button">
                                    <i class="far fa-edit"></i>
                            </button>

                            <a href="/delete-dosen/'.$row->id.'" data-confirm-delete="true">
                                <button class="btn btn-icon btn-danger"  data-toggle="tooltip" data-placement="top" title="delete" data-confirm-delete="true">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </a>
                            ';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('pages.dosen.index', compact('title'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // if (!$request->ajax()) {
        //     redirect('/dashboard');
		// }

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
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

        Alert::success('Success', 'Dosen berhasil ditambahkan');

        return redirect('/dosen');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {

        if (!$request->ajax()) {
            redirect('/dashboard');
		}
        $detail = User::find($id);

        return view('pages.dosen.edit', compact('detail'));
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

        return redirect('/dosen');
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
}
