<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', HomeController::class);
Route::any('/',[HomeController::class,'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/single-product', function(){
    return view('single-product');
});
Route::get('/checkout', function(){
    return view('checkout');
});
Route::get('/confirmation', function(){
    return view('confirmation');
});
Route::get('/cart', function(){
    return view('cart');
});
Route::get('/category', function(){
    return view('category');
});
Route::get('/index', function(){
    return view('admin.index');
});
Route::get('daftar-produk', function(){
    return view('admin.daftar_produk');
});
Route::get('tambah-produk', function(){
    return view('admin.tambah_produk');
});
Route::get('daftar-pelanggan', function(){
    return view('admin.daftar_pelanggan');
});
Route::get('daftar-pesanan', function(){
    return view('admin.daftar_pesanan');
});
Route::get('daftar-kupon', function(){
    return view('admin.daftar_kupon');
});
Route::get('tambah-kupon', function(){
    return view('admin.tambah_kupon');
});