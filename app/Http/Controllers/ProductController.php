<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Image;
use App\ProductReviews;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(Request $request)
    {
        $productInstance = new Product();
        $products = $productInstance->orderProducts($request->get('order_by'));
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::find($id);
        $review = ProductReviews::where('product_id', '=', $product->id)->get();
        $rating = ProductReviews::avg('rating');

        if ($product) {
            return view('products.show', compact('product', 'review', 'rating'));
        } else {
            return redirect('/products')->with('errors', 'Produk tidak ditemukan');
        }
    }

    public function image($imageName)
    {
        $filePath = public_path('images/image/' . $imageName);
        return Image::make($filePath)->response();
    }

    public function create()
    {
        return view('products.create');
    }


    public function storeReview(Request $request)
    {
        $this->validate(request(), [
            'rating' => 'required',
            'description' => 'required',
        ]);
        $reviews = new ProductReviews();
        $reviews->user_id = Auth::user()->id;
        $reviews->name = Auth::user()->name;
       
        $reviews->rating = $request->post('rating');
        $reviews->description = $request->post('description');

        $reviews->save();

        return redirect('admin/reviews')->with('success', 'Berhasil Menambahkan Review');
    }
}
