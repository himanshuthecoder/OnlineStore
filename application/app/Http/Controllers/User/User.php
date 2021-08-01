<?php

namespace App\Http\Controllers\User;

use App\Models\Store;
use App\Models\Product;
use App\Models\Tag;

use Request;
use App\Http\Controllers\Controller;
use Response;
use Auth;

class User extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.index');
    }

    public function show($page)
    {
        if($page == 'dashboard') return $this->showDashboard();
        if($page == 'products')  return $this->showProducts();
        if($page == 'help')      return $this->showHelp();
        if($page == 'stores')    return $this->showStores();


        return Response($page);
    }

    public function store()
    {
        $action  = Request::get('action');

        if($action == 'savestore') return $this->saveStore();
        if($action == 'saveproduct') return $this->saveProduct();
    }

    public function destroy($action)
    {
        if($action == 'deleteproduct') return $this->deleteProduct();
        model($model)->find($model)->delete();
    }

    private function deleteProduct()
    {
        $id = Request::get('id');
        Product::destroy($id);

        return Response::json(['status'=>'ok','msg'=>'Deleted']);
    }
    private function saveStore()
    {
        $storeid   = Request::get('storeid','new');
        $storename = Request::get('storename');
        $storedescription = Request::get('storedescription');  
        $storecontactno   = Request::get('storecontactno');
        $storeaddress     = Request::get('storeaddress');  
        $storetype        = Request::get('storetype');    
        $image            = Request::file('image');


        $imageNameToStore = 'storeplaceholder.png';
        if(Request::has('image'))
        {
            $imageNameToStore = $storename.'_'.time().'.'.$image->extension();
            $path = Request::file('image')->storeAs('public/images',$imageNameToStore);
        }        
        
        $STORE = new Store;

        $store = $STORE->findOrNew($storeid);
        $store->user_id     = Auth::user()->id;
        $store->name        = $storename;
        $store->description = $storedescription;
        $store->contactno   = $storecontactno;
        $store->address     = $storeaddress;
        $store->storetype   = $storetype;
        if(Request::has('image') || strtolower($storeid)== 'new')
            $store->image       = $imageNameToStore;
        $store->save();
        
        $msg = 'Created Successfully';
        if(strtolower($storeid) != 'new' ) $msg = "Updated Successfully";
        return Response::json(['status'=>'ok','msg'=>$msg]);

    }

    private function saveProduct()
    {
        $productid   = Request::get('product_id','new');
        $storeid     = Request::get('productstoreid');    
        $productname = Request::get('productname');
        $productprice = Request::get('productprice');
        $productquantity   = Request::get('productquantity');  
        $productdescription = Request::get('productdescription');  
        $productcategory = Request::get('productcategory');  
        $image            = Request::file('image');


        $imageNameToStore = 'productplaceholder.png';
        if(Request::has('image'))
        {
            $imageNameToStore = $productname.'_'.time().'.'.$image->extension();
            $path = Request::file('image')->storeAs('public/images',$imageNameToStore);
        }  
        
        $PRODUCT = new Product;

        $product = $PRODUCT->findOrNew($productid);
        $product->user_id     = Auth::user()->id;
        $product->store_id    = $storeid;
        $product->name        = $productname;
        $product->description = $productdescription;
        $product->price       = $productprice;
        $product->quantity    = $productquantity;  
        $product->category    = $productcategory;  
        if(Request::has('image') || strtolower($productid)== 'new' )
            $product->image = $imageNameToStore;    
        $product->save();
        
        $msg = 'Created Successfully';
        if(strtolower($productid) != 'new' ) $msg = "Updated Successfully";
        return Response::json(['status'=>'ok','msg'=>$msg]);

    }

    private function showDashboard()
    {
        $totalstore   = Store::where('user_id',Auth::user()->id)->count();
        $totalproduct = Product::where('user_id',Auth::user()->id)->count();
        $latestproducts = Product::latest()->take(5)->get();
        $categories   = Product::make()->getselecttype('category');

        $userproducts = Product::where('user_id',Auth::user()->id)->get()->groupBy('category');
        $category_product_chart = ['category'=>[],'productcount'=>[]];
        
        foreach ($userproducts as $category=>$userproduct) {
            $category_product_chart['category'][] = $categories[$category];
            $category_product_chart['productcount'][] = $userproduct->count();  
        }

        return view('user.pages.dashboard',['totalstore'=>$totalstore,'totalproduct'=>$totalproduct,'category_product_chart'=>$category_product_chart,'latestproducts'=>$latestproducts]);
    }

    private function showProducts()
    {   $products = Product::get();
        return view('user.pages.products',['products'=>$products]);
    }

    private function showStores()
    {
        $stores = Store::get();
        return view('user.pages.stores',['stores'=>$stores]);
    }

    private function showHelp()
    {
        return view('user.pages.help');
    }


}

