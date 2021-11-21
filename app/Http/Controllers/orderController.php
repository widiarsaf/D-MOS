<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\order_detail;
use App\Models\masakan;
use App\Models\QRcode;
use Illuminate\Http\Request;
use Carbon\Carbon;

class orderController extends Controller
{
    
    public function index(Request $request)
    {
        

    }

    public function pesanmeja(Request $request)
    {
        $no_table = $request->no_meja;
        // dd($no_table);
        do{
            $no_pesanan = "D-MOS" . "-" . $this->random_strings(3);
        }while(order::where('id',$no_pesanan)->get()->count() > 0);
        return view('pages.customer.passtable', compact('no_pesanan','no_table'));

        
    }


    public function cekDataPesanan($no)
    {
        $no_table = $no;

        $qrcodeList = QRcode::all();
        for ($i = 0; $i < count($qrcodeList); $i++) {
            if ($qrcodeList[$i]->code_meja===$no_table) {
                 do{
                    $no_pesanan = random_int(100000, 999999);
                }while(order::where('id',$no_pesanan)->get()->count() > 0);
                return view('pages.customer.passtable', compact('no_pesanan','no_table'));   
            } else {
                return view('pages.customer.QRcodeNotFound');
            }
        }
        
       
    }


    public function dataPesanan(Request $request)
    {
        $request->validate([
            'no_table'=>'required',
            'no_pesanan' => 'required',
            'nama_pemesan'=>'required',
        ]);

        $no_table = $request->get('no_table');
        $no_pesanan = $request->get('no_pesanan');
        $nama_pemesan = $request->get('nama_pemesan');
        
        $masakan = masakan::all();

        // dd($nama_pemesan, $no_table, $no_pesanan);
        return view('pages.customer.order', compact('no_table','no_pesanan', 'nama_pemesan', 'masakan'));
        
        
    }

    public function orderList(Request $request)
    {
        $pesananRaw = $request->get('order-list');
        $pesanan = json_decode($request->get('order-list'), true);
        $no_pesanan = $request->get('no_pesanan');
        $no_table = $request->get('no_table');
        $nama_pemesan = $request->get('nama_pemesan');
        $total = $request->get('total');
        $masakan = masakan::all();
        //  dd($pesanan);
        // dd($pesananRaw);
        return view('pages.customer.summary', compact('no_table','no_pesanan', 'nama_pemesan', 'pesanan', 'total', 'pesananRaw'));

    }


    
    public function create()
    {
        
    }
    public function cekorder()
    {
        $stat = false;
        $kondisi = "0";
        if(order::where('status_order',$kondisi)->get()->count() > 0){
            $stat = true;
        }
        return $stat;
    }

    
    public function store(Request $request)
    {
        $pesananRaw = $request->get('order-list');
        $pesanan = json_decode($request->get('order-list'), true);
        $no_pesanan = $request->get('no_pesanan');
        $no_table = $request->get('no_table');
        $nama_pemesan = $request->get('nama_pemesan');
        $total = $request->get('total');
        $order = order::create([
            'id'     => $no_pesanan,
            'no_meja'     => $no_table,
            'nama' => $nama_pemesan,
            'tanggal'=> Carbon::now(),
            'harga'=> $total,
            'status_order' => 'dipesan',
        ]);
        foreach($pesanan as $row){
            // echo ($row['id']);
            $order_detail = order_detail::create([
                'id_order'     => $no_pesanan,
                'id_masakan'     => $row['id'],
                'keterangan' => "-",
                'harga'=> $row['total'],
                'qty' => $row['count'],
            ]);
        }
        // $masakan = masakan::all();
        // dd($pesanan);
        return view('pages.customer.history', compact('no_table','no_pesanan', 'nama_pemesan', 'pesanan', 'total', 'pesananRaw'));
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}


