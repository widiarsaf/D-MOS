<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;

class statusController extends Controller
{
    public function toDibayar($id)
    {
        $order = order::where('id',$id)->first();
        $order->status_order = "dibayar";
        $order->save();
        return redirect()->route('orderWaiter.index');   
    }
    public function toDimasak($id)
    {
        $order = order::where('id',$id)->first();
        $order->status_order = "dimasak";
        $order->save();
        return redirect()->route('orderWaiter.index');   
    }
    public function toSiap($id)
    {
        $order = order::where('id',$id)->first();
        $order->status_order = "siap";
        $order->save();
        return redirect()->route('orderWaiter.index');   
    }
    public function toDiantar($id)
    {
        $order = order::where('id',$id)->first();
        $order->status_order = "diantar";
        $order->save();
        return redirect()->route('orderWaiter.index');   
    }
    public function toDitutup($id)
    {
        $order = order::where('id',$id)->first();
        $order->status_order = "ditutup";
        $order->save();
        return redirect()->route('orderWaiter.index');   
    }
}
