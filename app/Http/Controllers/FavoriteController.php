<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function __construct()
    {
        
    }

    public function index()
    {
        return view('favorites.index');
    }

    public function add($id)
    {
        $product = Product::find($id);
        if(!$product) {
            abort(404);
        }

        $favorite = session()->get('favorite');
        
        // if favorite is empty then this the first product
        if(!$favorite) {

            $favorite = [
                $id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "image_url" => $product->image_url
                ]
            ];

            session()->put('favorite', $favorite);

            return redirect('/favorites')->with('success', 'Product added to favorite successfuly!');
        }

        // if favorite not empty then check if this product exist then increment quantity
        if(isset($favorite[$id])) {

            $favorite[$id]['quantity']++;

            session()->put('favorite', $favorite);

            return redirect('/favorites')->with('success', 'Product added to favorite succesfully!');
        }

        // if item not exist in favorite then add to favorite with quantity = 1
        $favorite[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "image_url" => $product->image_url
        ];

        session()->put('favorite', $favorite);

        return redirect('/favorites')->with('success', 'Product added to favorite succesfully!');
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $favorite = session()->get('favorite');

            if(isset($favorite[$request->id])) {
                unset($favorite[$request->id]);
                session()->put('favorite', $favorite);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }
}
