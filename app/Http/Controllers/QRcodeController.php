<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QRcode;
use Illuminate\Support\Facades\Storage;

class QRcodeController extends Controller
{
    
    public function index()
    {
        $qrcode= QRcode::get();
        return view('pages.waiter.qrcode.indexQR', compact('qrcode'));
    }

    
    public function create()
    {
        return view('pages.waiter.qrcode.createQR');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'code_meja'=>'required',
            'link' => 'required',
            'gambar'=>'nullable',
        ]);

        $qrcode = new QRcode;

        if ($request->file('gambar')) {
            $image_name = $request->file('gambar')->store('images', 'public');
            $qrcode->gambar_qrcode = $image_name;
            // dd($request->file('gambar'));
        }

        $qrcode->code_meja = $request->get('code_meja');
        $qrcode->link = $request->get('link');

        $qrcode->save();
        return redirect()->route('qrcode.index')
            ->with('success', 'qrcode berhasil ditambahkan');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $qrcode = QRcode::where('id', $id)->first();
        return view('pages.waiter.qrcode.editQR', compact('qrcode'));
    }

   
    public function update(Request $request, $id)
    {
        $request->validate([
            'code_meja'=>'required',
            'link' => 'required',
            'gambar'=>'nullable',
        ]);

        $qrcode = QRcode::where('id', $id)->first();

        if ($request->file('gambar')) {
            $image_name = $request->file('gambar')->store('images', 'public');
            $qrcode->gambar_qrcode = $image_name;
            // dd($request->file('gambar'));
        }

        $qrcode->code_meja = $request->get('code_meja');
        $qrcode->link = $request->get('link');

        $qrcode->save();
        return redirect()->route('qrcode.index')
            ->with('success', 'qrcode berhasil diupdate');
    }

    
    public function destroy($id)
    {
        $qrcode = QRcode::find($id)->first();
        Storage::delete('public/' . $qrcode->gambar);
        $qrcode->delete();
        return redirect()-> route('qrcode.index')
            ->with('Sukses, QR code berhasil diperbarui');
    }
}
