<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ProductReviews;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews=ProductReviews::all();

        return view('admin.reviews.index', compact('reviews'));
    }
}
