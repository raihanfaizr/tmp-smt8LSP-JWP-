<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Catalogue;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = Order::join('catalogues', 'orders.id_catalogue', '=', 'catalogues.id')
                        ->select('orders.*', 'catalogues.nama_produk')
                        ->get();
        // $requestedOrder = Order::join('catalogues', 'orders.id_catalogue', '=', 'catalogues.id')->where('orders.order_status', 'requested')->get();
        // $acceptedOrder = Order::where('order_status', 'accepted')->get();
        // $rejectedOrder = Order::where('order_status', 'rejected')->get();

        $data = [
            'order' => $order,
            // 'requestedOrder' => $requestedOrder,
            // 'acceptedOrder' => $acceptedOrder,
            // 'rejectedOrder' => $rejectedOrder,
        ];
        return view('admin.order.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $getData = Order::where('id', $order->id)->first();
        $getDataProduct = Catalogue::where('id', $getData->id_catalogue)->first();
        $data = [
            'order' => $getData, 
            'catalogue' => $getDataProduct, 
        ];
        return view('admin.order.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $request->validate([
            'nama_pemesan' => 'required',
            'no_hp_pemesan' => 'required',
            'email_pemesan' => 'required',
            'lokasi' => 'required',
        ]);

        Order::updateOrCreate(
            ['id' => $order->id],
            [
                'nama_pemesan' => $request->nama_pemesan,
                'no_hp_pemesan' => $request->no_hp_pemesan,
                'email_pemesan' => $request->email_pemesan,
                'lokasi' => $request->lokasi,
                'catatan' => $request->catatan,
            ]
        );

        session()->flash('success', 'Data berhasil diubah');
        return redirect('/admin/order/'.$order->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        // hapus data
        Order::destroy($order->id);

        session()->flash('success', 'Data berhasil dihapus');
        return redirect('/admin/order/');
    }
}
