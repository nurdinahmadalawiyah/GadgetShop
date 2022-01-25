<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;

class AdminOrderController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
    }

    public function index()
    {
        $orders=Order::where('status', '=', 'PENDING')->get();
        return view('admin.adminorders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::find($id);
        if ($order) {
            return view('admin.adminorders.show', compact('order'));
        } else {
            return redirect('admin/adminorders')->with('errors', 'Order tidak ditemukan');
        }
    }
    public function clone($id) 
    {
        $order = Order::findorfail($id);
        $new_order = $order->replicate();
        $new_order->status = 'DIPROSES';
        $order->delete();
        $new_order->id = $order->id;
        $new_order->save();
        

        return redirect('admin/prosesorders/')->with('success', 'Proses pesanan berhasil di update');
    }
}
