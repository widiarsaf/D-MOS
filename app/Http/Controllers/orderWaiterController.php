<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\order_detail;
use PDF;

class orderWaiterController extends Controller
{
    
    public function index()
    {
        $stattrigger1 = "ditutup";
        $order = order::where('status_order','!=',$stattrigger1)->get();
        return view('pages.waiter.order.openOrder', compact('order'));
    }

    public function closeOrder()
    {
        $stattrigger = "ditutup";
        $order = order::where('status_order',$stattrigger)->get();
        return view ('pages.waiter.order.closeOrder', compact('order'));
    }

    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        $order = order::where('id',$id)->first();
        $orderDetail = order_detail::where('id_order', $id)->with('masakan')->get();
        // dd($data);
        return view('pages.waiter.order.orderDetail', compact('order', 'orderDetail'));


    }

    
    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        
    }

    public function updateStatus(Request $request, $id)
    {
        $status = $request->get('status');
        // dd($status);
        $order = order::where('id', $id)->first();
        $order->status_order = $request->get('status');
        $order->save();

        $order = order::where('id',$id)->get();
        $orderDetail = order_detail::where('id_order', $id)->get();
        return view('pages.waiter.order.closeOrder', compact('order', 'orderDetail'));
    }

    public function konfirmasi($id, $code)
    {
        $order = order::where('id',$id)->first();
        if($code == 1){
            $order->status_order = "dibayar";
        }elseif($code == 2){
            $order->status_order = "ditutup";
        }
        $order->save();
        return redirect()->route('orderWaiter.index');
    }

    public function print(){
        $order = order::all();
        $order_detail = order_detail::with('masakan')->get();
        $pdf = PDF::loadview('pages.waiter.order.order_pdf',compact('order','order_detail'));
        return $pdf->download('laporan-order-pdf.pdf');
    }
    public function print2($id){
        $order = order::all();

        $pdf = PDF::loadview('pages.waiter.order.order_pdf',['order'=>$order]);
        return $pdf->download('laporan-order-pdf');
    }
    
    public function destroy($id)
    {
        //
    }
}
