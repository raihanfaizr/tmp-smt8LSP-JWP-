<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login(){
        return view('admin.login');
    }

    public function loginProcess(Request $request){
        $user = User::where('id', '1')->first();

        $checkPassword = Hash::check($request->password, $user->password);

        if ($request->username === $user->username && $checkPassword === true) {
            session()->put('admin-go', 'yes');
            return redirect('admin/');
        }else{
            session()->flash('galat', 'Username / Password salah');
            return redirect('admin/login');
        }
    }

    public function logout(){
        session()->forget('admin-go');
        return redirect('admin/login');
    }

    public function index(){
        return view('admin.index');
    }

    public function changeOrderStatus(Request $request){
        Order::updateOrCreate(
            ['id' => $request->id],
            [
                'order_status' => $request->changeStatus,
            ]
        );

        session()->flash('success', 'Data berhasil diubah');
        return redirect('/admin/order/');
    }

    public function cetakLaporan(Request $request){
        $order = Order::join('catalogues', 'orders.id_catalogue', '=', 'catalogues.id')
                        ->select('orders.*', 'catalogues.nama_produk')
                        ->get();

        $data = [
            'order' => $order,
        ];
        return view('admin.print-order')->with($data);
    }
}
