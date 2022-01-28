<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function AllProduct()
    {
        $products = Product::all();
        return view('products.index',['products'=>$products]);
    }
    public function Create()
    {
        return view('products.create');
    }
    public function Store(Request $request)
    {
        $rules = [
            'productname'=>'required|max:50',
            'productdesc' => 'required|min:10',
            'price'=>'required',
        ];
        $customMessages = [
            'productname.required' => 'กรุณากรอกชื่อผลิตภัณฑ์',
            'productname.max' => 'ชื่อผลิตภัณฑ์ต้องมีตัวอักษรไม่เกิน 50 ตัวอักษร',
            'productdesc.required' => 'กรุณากรอกคำอธิบายผลิตภัณฑ์',
            'productdesc.min' => 'คำอธิบายผลิตภัณฑ์ต้องมีตัวอักษรอย่างน้อย 10 ตัวอักษร',
            'price.required'  => 'กรุณากรอกราคา',
        ];
        $request->validate($rules,$customMessages);

        $product = new Product;
        $product->productName = $request->productname;
        $product->productDesc = $request->productdesc;
        $product->price = $request->price;
        $product->fileUpload = "";
        $product->save();
        return redirect()->route('product.index');
    }
    public function Edit($id)
    {
        $product = Product::find($id);
        return view('products.edit',['id'=>$id,'product'=>$product]);
    }
    public function Update(Request $request,$id)
    {
        $rules = [
            'productname'=>'required|max:50',
            'productdesc' => 'required|min:10',
            'price'=>'required',
            'fileUpload'=>'required'
        ];
        $customMessages = [
            'productname.required' => 'กรุณากรอกชื่อผลิตภัณฑ์',
            'productname.max' => 'ชื่อผลิตภัณฑ์ต้องมีตัวอักษรไม่เกิน 50 ตัวอักษร',
            'productdesc.required' => 'กรุณากรอกคำอธิบายผลิตภัณฑ์',
            'productdesc.min' => 'คำอธิบายผลิตภัณฑ์ต้องมีตัวอักษรอย่างน้อย 10 ตัวอักษร',
            'price.required'  => 'กรุณากรอกราคา',
        ];
        //update file
        $path = "";
        if ($request->hasFile('fileUpload')) {
            $file = $request->file('fileUpload');
            // $path = Storage::putFile('public', $file);
            $path = Storage::putFileAs('public', $file,$id.'.'.$file->extension());
            $path = str_replace("public","",$path);
        }
        $request->validate($rules,$customMessages);
        $product = Product::find($id);
        $product->productName = $request->productname;
        $product->productName = $request->productname;
        $product->productDesc = $request->productdesc;
        $product->price = $request->price;
        $product->fileUpload = $path;
        $product->save();
        return redirect()->route('product.index');
    }
    public function Destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product.index');
    }
}
