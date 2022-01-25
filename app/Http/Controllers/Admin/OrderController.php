<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use Auth;
use App\OrderItem;

class OrderController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
    }

    public function index()
    {
        $orders=Order::where('user_id', '=', Auth::user()->id)->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        $cart = session()->get('cart');
        if($cart) {
            return view('admin.orders.create');
        } else {
            return redirect('/')->with('success', 'Anda harus belanja terlebih dahulu');
        }
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'address' => 'required',
            'address_line2' => 'required',
            'district' => 'required',
            'city' => 'required',
            'province' => 'required',
            'phone_number' => 'required',
            'zip_code' => 'required'
        ]);

        //Get total price
        $cart = session()->get('cart');
        $total_price = 0;
        foreach ( $cart as $id => $product) {
            $total_price += $product['price'] * $product['quantity'];
        }
        //Get total price

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->status = 'PENDING';
        $order->address = $request->post('address');
        $order->address_line2 = $request->post('address_line2');
        $order->district = $request->post('district');
        $order->city = $request->post('city');
        $order->province = $request->post('province');
        $order->phone_number = $request->post('phone_number');
        $order->zip_code = $request->post('zip_code');
        $order->total_price = $total_price;
        $order->save();

        //Save Order Item
        foreach ( $cart as $id => $product) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $id;
            $orderItem->quantity = $product['quantity'];
            $orderItem->price = $product['price'];
            $orderItem->Save();
        }

        // remove chart session
        session()->forget('cart');
        // remove chart session

        return redirect('admin/orders/' . $order->id)->with('success', 'Order Berhasil di simpan');
    }

    public function show($id)
    {
        $order = Order::find($id);
        if ($order) {
            return view('admin.orders.show', compact('order'));
        } else {
            return redirect('admin/orders')->with('errors', 'Order tidak ditemukan');
        }
    }

    public function edit(Order $order)
    {
        return view('admin.orders.edit', compact('order')); 
    }

    public function update(Request $request, Order $order)
    {
        $this->validate(request(), [
            'address' => 'required',
            'address_line2' => 'required',
            'district' => 'required',
            'city' => 'required',
            'province' => 'required',
            'phone_number' => 'required',
            'zip_code' => 'required'
        ]);

        $order->user_id = Auth::user()->id;
        $order->status = 'PENDING';
        $order->address = $request->post('address');
        $order->address_line2 = $request->post('address_line2');
        $order->district = $request->post('district');
        $order->city = $request->post('city');
        $order->province = $request->post('province');
        $order->phone_number = $request->post('phone_number');
        $order->zip_code = $request->post('zip_code');
        $order->save();

        return redirect('admin/orders/' . $order->id)->with('success', 'Alamat erhasil di update');
    }
}
