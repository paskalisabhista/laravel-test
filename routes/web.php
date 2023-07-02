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
    return view('auth.login');
});

Route::get('/home', function () {
    return view('HomePage');
});

Route::get('/stocklist', function () {
    return view('StockList');
});

Route::get('/addproduct', function () {
    return view('AddProductForm');
});

//routing untuk tampilan di HP (top 3 on list)
Route::get('/api/gethargaproduk',[App\Http\Controllers\APIController::class, 'gethargaproduk'])->name('gethargaproduk');

//routing untuk memasukkan orderan dari hp ke database
Route::post('/api/orderproduk',[App\Http\Controllers\APIController::class, 'orderproduk'])->name('orderproduk');

//routing untuk menampilkan semua stock di web
Route::get('/stocklist',[App\Http\Controllers\ProductController::class, 'product'])->name('stocklist');

//routing untuk login di aplikasi
Route::get('/api/login',[App\Http\Controllers\APIController::class, 'login'])->name('login');
Route::post('/api/login',[App\Http\Controllers\APIController::class, 'login'])->name('loginpost');

//routing untuk register di aplikasi
Route::post('/api/register',[App\Http\Controllers\APIController::class, 'registerMobile'])->name('registermobile');

//routing untuk penambahan barang
    // untuk menampilkan form nya
Route::get('/productform',[App\Http\Controllers\ProductController::class, 'form'])->name('productform');
    // untuk query ke database
Route::post('/productform',[App\Http\Controllers\ProductController::class, 'addProduct'])->name('addproduct');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
