<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{

    public function __construct()
    {
        
    }


    public function index()
    {
        return view('home');
    }

    public function adminHome()
    {
        return view('adminHome');
    }
}
