<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use App\Models\Order;
use App\Models\SettingWeb;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $catalogue = Catalogue::all();
        $settingWeb = SettingWeb::where('id', 1)->first();
        $data = [
            'catalogue' => $catalogue,
            'settingWeb' => $settingWeb,
        ];
        return view('user.index', $data);
    }

    public function order(Request $request){
        $catalogue = Catalogue::where('id', $request->product)->first();
        $data = [
            'catalogue' => $catalogue
        ];
        return view('user.order', $data);
    }

    public function orderProcess(Request $request){
        // Validasi request
        $request->validate([
            'nama_pemesan' => 'required',
            'no_hp_pemesan' => 'required',
            'email_pemesan' => 'required',
            'lokasi' => 'required',
            'id_catalogue' => 'required',
        ]);

        // membuat kode order
        $orderCode = rand(1000000000000000,9999999999999999);
        $checkOrderCode = Order::where('order_code', $orderCode)->first();

        // cek bila ada kode order yang sama
        if ($checkOrderCode !== null) {
            while ($orderCode === $checkOrderCode->order_code) {
                $orderCode = rand(1000000000000000,9999999999999999);
            }
        }

        Order::create([
            'order_code' => $orderCode,
            'nama_pemesan' => $request->nama_pemesan,
            'no_hp_pemesan' => $request->no_hp_pemesan,
            'email_pemesan' => $request->email_pemesan,
            'lokasi' => $request->lokasi,
            'catatan' => $request->catatan,
            'id_catalogue' => $request->id_catalogue,
            'order_status' => 'requested',
        ]);

        session()->flash('success', 'Pesanan berhasil dibuat');
        return redirect('order-check?order_code='.$orderCode.'#order-check');
    }

    public function orderCheck(Request $request){
        if ($request->order_code) {            
            $orderData = Order::where('order_code', $request->order_code)->first();
            $productData = Catalogue::where('id', $orderData->id_catalogue)->first();
            $data = [
                'data' => 'y',
                'order' => $orderData,
                'product' => $productData
            ];
        }else{
            $data = ['data' => 'n'];
        }
        return view('user.order-check', $data);
    }
}
