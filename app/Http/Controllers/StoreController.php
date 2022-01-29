<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function Home()
    {
        $products = Product::all();
        return view('home',['products'=>$products]);
    }
    public function About()
    {
        return view('about');
    }
}
