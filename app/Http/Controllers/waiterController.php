<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;


class waiterController extends Controller
{
   
    public function index()
    {
        $waiter = User::where('level', '2')->get();
            // dd($waiter);
        return view('pages.admin.indexWaiter', compact('waiter'));
    }

    
    public function create()
    {
        return view('pages.admin.createWaiter');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email' => 'required',
            'level'=>'required',
            'password' => 'required',
        ]);
        $waiter = new User;
        $waiter->name = $request->get('name');
        $waiter->level = $request->get('level');
        $waiter->email = $request->get('email');
        $waiter->password = Hash::make($request->get('password'));

        $waiter->save();
        return redirect()->route('waiter.index')
            ->with('success', 'Waiter berhasil ditambahkan');

    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
         $waiter = user::where('id', $id)->first();
         return view('pages.admin.editWaiter', compact('waiter'));
    }

    
    public function update(Request $request, $id)
    {
         $request->validate([
            'name'=>'nullable',
            'email' => 'nullable',
            'level'=>'required',
            'password' => 'nullable'
        ]);
        $waiter = user::where('id', $id)->first();
        $waiter->name = $request->get('name');
        $waiter->level = $request->get('level');
        $waiter->email = $request->get('email');
        $waiter->password = Hash::make($request->get('password'));

        $waiter->save();
        return redirect()->route('waiter.index')
            ->with('success', 'Waiter berhasil diperbarui');
    }

    
    public function destroy($id)
    {
        $waiter = user::find($id);
        $waiter->delete();
        return redirect()->route('waiter.index')
            ->with('Sukses, Waiter berhasil dihapus');

    }
}
