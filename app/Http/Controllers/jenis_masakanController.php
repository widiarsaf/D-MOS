<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jenis_masakan;
use DB;

class jenis_masakanController extends Controller
{

    public function index()
    {
        $jenisMasakan = DB::table('jenis_masakan')->get();
        return view ('pages.waiter.menu.indexJenisMenu', compact('jenisMasakan'));
    }


    public function create()
    {
        return view('pages.waiter.menu.createJenisMenu');
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis'=>'required',
        ]);

        jenis_masakan::create($request->all());

        return redirect()->route('jenis_masakan.index')
            ->with('Sukses, jenis menu telah ditambahkan');
    }


    public function show($id)
    {
        
    }


    public function edit($id)
    {
        $jenisMasakan = DB::table('jenis_masakan')->where('id', $id)->first();
        return view('pages.waiter.menu.editJenisMenu', compact('jenisMasakan'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jenis'=>'required',
        ]);;

        jenis_masakan::find($id)->update($request->all());

        return redirect()->route ('jenis_masakan.index')
            ->with('Sukses, jenis menu berhasil diperbarui');
    }

    public function destroy($id)
    {
        jenis_masakan::find($id)->delete();
        return redirect()->route('jenis_masakan.index')
            ->with('Sukses, menu berhasil dihapus');
    }
}


