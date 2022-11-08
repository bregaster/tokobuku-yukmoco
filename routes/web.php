<?php

use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KuponController;
use App\Http\Controllers\PesananController;

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
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/daftar-user', [UserController::class, 'daftar_user'])->name('daftar-user');
Route::get('/daftar-kupon', [KuponController::class, 'daftar_kupon'])->name('daftar-kupon');
Route::get('/checkout', [PesananController::class, 'checkout'])->name('checkout');
Route::post('tambah-kupon', [KuponController::class, 'tambah_kupon'])->name('tambah-kupon');
Route::post('/image-resize', [BukuController::class, 'imgResize'])->name('img-resize');
Route::get('/single-product', function(){
    return view('single-product');
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
Route::get('daftar-pesanan', function(){
    return view('admin.daftar_pesanan');
});
Route::get('tambah-kupon', function(){
    return view('admin.tambah_kupon');
});
Route::get('pengaturan', function(){
    return view('admin.pengaturan');
});