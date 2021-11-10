<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\meja;

class mejaController extends Controller
{
    public function index() {
        $meja = meja::all();
        return view ('pages.waiter.table.indexTable', ['meja' => $meja]);
    }

    public function store(Request $request) {
        $meja = new meja;
        $meja->name = $request->name;
        $meja->save();
        return back()
            ->with('Sukses, meja baru berhasil ditambahkan');
    }

    public function generate($id) {
        $meja = meja::findOrFail($id);
        $qrcode = QrCode::size(400)->generate($meja->name);
        return view ('pages.waiter.table.qrcode',compact('qrcode'));
    }

    public function destroy($id) {
        $meja = meja::find($id)->first();
        $meja::delete();
        return back()
            ->with('Sukses, meja berhasil dihapus');
    }
}
