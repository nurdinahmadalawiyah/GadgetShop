<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;

class FinishOrderController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
    }

    public function index()
    {
        $orders=Order::where('status', '=', 'SELESAI')->get();
        return view('admin.finishorders.index', compact('orders'));
    }
}
