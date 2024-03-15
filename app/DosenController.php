<?php

namespace App;

use App\Http\Controllers\Controller;
// use App\DataTables\DosenDataTable;
use Yajra\DataTables\DataTables;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(Request $request)
    // {
    //     $title = 'Dosen Data Page';
    //     $pagination = 10;
    //     $listbarang = DB::table('users')->paginate($pagination);
    //     return view('pages.dosen.index', compact('title', 'listbarang'))->with('i', ($request->input('page', 1) - 1) *  $pagination);;

    // }

    public function index(Request $request)
    {
        $title = 'Dosen Data Page';
        if ($request->ajax()) {
            $data = DB::table('users');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                            $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
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
    public function create()
    {
        dd("test") ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
