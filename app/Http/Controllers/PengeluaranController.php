<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;

class PengeluaranController extends Controller
{
    public function index()
    {
        return view('pengeluaran.index');
    }

    public function data()
    {
        $pengeluaran = Pengeluaran::orderBy('id_pengeluaran', 'desc')->get();

        return datatables()
        ->of($pengeluaran)
        ->addIndexColumn()
        ->addColumn('created_at', function ($pengeluaran) {
            return tanggal_indonesia($pengeluaran->created_at, false);
        })
        ->addColumn('nominal', function ($pengeluaran) {
            return format_uang($pengeluaran->nominal);
        })
        ->addColumn('aksi', function($pengeluaran) {
            return '
            <div class="btn-group">
                <button type="button" onclick="editform(`'. route('$pengeluaran.update', $pengeluaran->id_kategori)  .'`)" class ="btn btn-xs btn-info btn-flat"> <i class="fa fa-pencil"></i></button>
                <button type="button" onclick="deleteData(`'. route('$pengeluaran.destroy', $pengeluaran->id_kategori)  .'`)" class ="btn btn-xs btn-danger btn-flat"> <i class="fa fa-trash"></i></button>
                </div>
            ';
        })
        ->rawColumns(['aksi' ])
        ->make(true);
    }

     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $pengeluaran =  Pengeluaran::create($request->all());

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $pengeluaran = Pengeluaran::find($id);
        return response()->json($pengeluaran);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $pengeluaran = Pengeluaran::find($id)->update($request->all());

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->delete();

        return response(null, 204);
    }

}
