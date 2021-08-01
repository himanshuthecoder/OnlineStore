<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Product;
use App\Models\Tag;

use Illuminate\Http\Request;

class Stores extends Controller
{
    //
    public function index()
    {
        $stores = Store::get();
        return view('store.stores',['stores'=>$stores]);
    }

    public function show($id)
    {   $store = Store::find($id);
        return view('store.storeview',['store'=>$store]);
    }
}
