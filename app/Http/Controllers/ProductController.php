<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function AllProduct()
    {
        return view('products.index');
    }
    public function Create()
    {
        return view('products.create');
    }
    public function Edit($id)
    {
        return view('products.edit',['id'=>$id]);
    }
}
