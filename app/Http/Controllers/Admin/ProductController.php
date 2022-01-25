<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $productInstance = new Product();
        $products = $productInstance->orderProducts($request->get('order_by'));
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|unique:products,name',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);

        $products = new Product();
        $products->user_id = Auth::user()->id;
        $products->name = $request->post('name');
        $products->price = $request->post('price');
        $products->description = $request->post('description');
        if ($request->hasFile('image_url')) {
            $image_url = $request->file('image_url');
            $name = rand(1000, 9999) . $image_url->getClientOriginalName();
            $image_url->move('images/image/', $name);
            $products->image_url = $name;
        }

        $products->save();

        return redirect('admin/products')->with('success', 'Produk berhasil di simpan');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $product->name = $request->post('name');
        $product->price = $request->post('price');
        $product->description = $request->post('description');
        if ($request->hasFile('image_url')) {
            $product->delete_image_url();
            $image_url = $request->file('image_url');
            $name = rand(1000, 9999) . $image_url->getClientOriginalName();
            $image_url->move('images/image/', $name);
            $product->image_url = $name;
        }
        $product->save();

        return redirect('admin/products')->with('success', 'Produk berhasil di update');
    }

    public function destroy(Product $product)
    {
        $product->delete_image_url();
        $product->delete();
        return redirect('admin/products')->with('success', 'Produk Berhasil di Hapus');
    }
}
