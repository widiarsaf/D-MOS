<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\extra;
use DB;

class extraController extends Controller
{

    public function index()
    {
        $extra = DB::table('extra')->get();
        return view ('pages.waiter.menu.indexMenuExtra', compact('extra'));
    }


    public function create()
    {
        return view('pages.waiter.menu.createMenuExtra');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_extra'=>'required',
            'harga' => 'required'
        ]);

        extra::create($request->all());
        return redirect()->route('extra.index')
            ->with('Sukses, menu extra telah ditambahkan');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $extra = DB::table('extra')->where('id', $id)->first();
        return view('pages.waiter.menu.editMenuExtra', compact('extra'));
    }


    public function update(Request $request, $id)
    {
         $request->validate([
            'nama_extra'=>'required',
            'harga' => 'required'
        ]);;

        extra::find($id)->update($request->all());

        return redirect()->route ('extra.index')
            ->with('Sukses, menu extra berhasil diperbarui');
    }

    
    public function destroy($id)
    {
        jenis_masakan::find($id)->delete();
        return redirect()->route('extra.index')
            ->with('Sukses, menu extra berhasil dihapus');
    }
}


