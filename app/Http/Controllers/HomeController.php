<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\masakan;
use App\Models\jenis_masakan;
use App\Models\order;
use App\Models\User;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        if(Auth::User()->level == 1){
            $waiter = User::where('level', '2')->get();
            // dd($waiter);
            return view('pages.admin.indexWaiter', compact('waiter'));
        }else{
        $stattrigger = 0;
        $order = order::where('status_order',$stattrigger)->get();
        return view('pages.waiter.order.openOrder', compact('order'));
        }
    }
    
}
