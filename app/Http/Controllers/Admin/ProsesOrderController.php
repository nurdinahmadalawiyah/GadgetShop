<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;

class ProsesOrderController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
    }

    public function index()
    {
        $orders=Order::where('status', '=', 'DIPROSES')->get();
        return view('admin.prosesorders.index', compact('orders'));
    }

    public function clone($id) 
    {
        $order = Order::findorfail($id);
        $new_order = $order->replicate();
        $new_order->status = 'SEDANG DALAM PENGIRIMAN';
        $order->delete();
        $new_order->id = $order->id;
        $new_order->save();


        return redirect('admin/deliveryorders/')->with('success', 'Pengiriman pesanan berhasil di update');

    }
}
