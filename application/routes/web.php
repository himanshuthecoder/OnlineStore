<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(Auth::user())return  redirect()->route('user');
    return view('welcome');
});

Route::get('explore', function () {
    return view('explore');
});

Route::get('/product', [App\Http\Controllers\Products::class, 'index'])->name('allproduct');
Route::get('/product/{id}', [App\Http\Controllers\Products::class, 'show'])->name('productview');

Route::get('/store', [App\Http\Controllers\Stores::class, 'index'])->name('allstore');
Route::get('/store/{id}', [App\Http\Controllers\Stores::class, 'show'])->name('storeview');

Auth::routes();

Route::get('/user', [App\Http\Controllers\User\User::class, 'index'])->name('user');
Route::get('/user/{id}', [App\Http\Controllers\User\User::class, 'show'])->name('show');
Route::post('/user', [App\Http\Controllers\User\User::class, 'store'])->name('store');
Route::delete('/user/{id}', [App\Http\Controllers\User\User::class, 'destroy'])->name('destroy');

