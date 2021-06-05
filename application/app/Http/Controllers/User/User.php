<?php

namespace App\Http\Controllers\User;

use Request;
use App\Http\Controllers\Controller;

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
        return view('user/index');
    }

    public function show($page)
    {
        if($page == 'dashboard') return $this->showDashboard();
        if($page == 'products')  return $this->showProducts();
        if($page == 'help')      return $this->showHelp();
        if($page == 'stores')    return $this->showStores();


        return Response($page);
    }

    private function showDashboard()
    {
        return view('user.pages.dashboard');
    }

    private function showProducts()
    {
        return view('user.pages.products');
    }

    private function showStores()
    {
        return view('user.pages.stores');
    }

    private function showHelp()
    {
        return view('user.pages.help');
    }


}

