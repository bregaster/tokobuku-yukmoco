<?php

use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KuponController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\ProdukPesananController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

// home;
Route::any('/',[HomeController::class,'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');


//user
Route::get('/daftar-user', [UserController::class, 'daftar_user'])->name('daftar-user');
Route::get('/profil', [UserController::class, 'daftar_user'])->name('profil');

//kupon
Route::get('/daftar-kupon', [KuponController::class, 'daftar_kupon'])->name('daftar-kupon');
//Route::post('tambah-kupon', [KuponController::class, 'tambah_kupon'])->name('tambah-kupon');

//pesanan
Route::get('/checkout', [PesananController::class, 'checkout'])->name('checkout');
Route::get('add-to-cart/{id}', [PesananController::class, 'addToCart'])->name('add-to-cart');
Route::delete('remove-from-cart', [PesananController::class, 'removeCart'])->name('removeCart');
Route::patch('update-cart', [PesananController::class, 'updateCart'])->name('updateCart');
Route::get('proces-checkout', [PesananController::class, 'processCheckout'])->name('proces-checkout');

//gudang
Route::post('tambah-gudang', [GudangController::class, 'tambah_gudang'])->name('tambah-gudang');
Route::get('/daftar-gudang', [GudangController::class, 'daftar_gudang'])->name('daftar-gudang');

//buku
Route::post('/add-product', [BukuController::class, 'store'])->name('add-product');
Route::get('/daftar-produk', [BukuController::class, 'daftar_produk'])->name('daftar-produk');


//auth
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register');
Route::get('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/');
})->name('logout');

//resources
Route::resource('kupons', KuponController::class);
Route::resource('bukus', BukuController::class);
Route::resource('pesanan', PesananController::class);
Route::resource('gudangs', GudangController::class);
Route::resource('users', UserController::class);
Route::resource('homes', HomeController::class);



//view
Route::get('/single-product', function(){
    return view('single-product');
});
Route::get('/keranjang', function(){
    return view('keranjang');
});
Route::get('/confirmation', function(){
    return view('confirmation');
});
Route::get('/keranjang', function(){
    return view('keranjang');
});
Route::get('/category', function(){
    return view('category');
});
Route::get('/index', function(){
    return view('admin.index');
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
Route::get('tambah-gudang', function(){
    return view('admin.tambah_gudang');
});
Route::get('pengaturan', function(){
    return view('admin.pengaturan');
});

