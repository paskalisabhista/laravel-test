<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function form (){
        return view('AddProductForm');
    }

    public function product (){
        $products =  Product::all(); // select* from product
        return view('stocklist',compact ('products'));
    }    
    public function addProduct (){
        $product = new Product();

        $product->product_name = \request('name');
        $product->product_price = \request('price');

        $product->save();
        return redirect()->route('productform')->with('success', 'Product Added Successfully');
    }
}
