<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;


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

        if ($request->ajax()) {
            $data = User::where('role', 'dosen')->latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                            $btn =
                            '<button class="btn btn-icon btn-success" data-toggle="tooltip" data-placement="top" title="detail">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="btn btn-icon btn-primary" data-toggle="tooltip" data-placement="top" title="edit">
                                <i class="far fa-edit"></i>
                            </button>
                            <button class="btn btn-icon btn-danger"  data-toggle="tooltip" data-placement="top" title="edit">
                                <i class="far fa-trash-alt"></i>
                            </button>';
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
    public function show($id)
    {

        dd($id);
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
    public function update(Request $request, $id)
    {
        //
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
