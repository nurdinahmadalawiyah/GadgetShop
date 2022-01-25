<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;

class DeliveryOrderController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
    }

    public function index()
    {
        $orders=Order::where('status', '=', 'SEDANG DALAM PENGIRIMAN')->get();
        return view('admin.deliveryorders.index', compact('orders'));
    }


    public function clone($id) 
    {
        $order = Order::findorfail($id);
        $new_order = $order->replicate();
        $new_order->status = 'SELESAI';
        $order->delete();
        $new_order->id = $order->id;
        $new_order->save();

        return redirect('admin/finishorders/')->with('success', 'Pengiriman pesanan berhasil di update');

    }
}
