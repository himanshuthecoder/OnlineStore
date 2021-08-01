<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Product;
use App\Models\Tag;

use Illuminate\Http\Request;

class Products extends Controller
{
    //
    public function index()
    {
        $products = Product::get();
        return view('product.products',['products'=>$products]);
    }

    public function show($id)
    {   $product = Product::find($id);
        $similarproducts = Product::where('category',$product->category)->limit(12)->get();
        $randomproducts = Product::inRandomOrder()->take(12)->get();
        return view('product.productview',['product'=>$product,'similarproducts'=>$similarproducts,'randomproducts'=>$randomproducts]);
    }
}
