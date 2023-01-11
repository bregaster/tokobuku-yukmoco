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
use App\Http\Controllers\MailController;

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
Route::get('/daftar-user', [UserController::class, 'daftar_user'])->name('daftar-user')->middleware('admin');
Route::get('/informasi-akun/{id}', [UserController::class, 'show'])->name('informasi-akun');

//kupon
Route::get('/daftar-kupon', [KuponController::class, 'daftar_kupon'])->name('daftar-kupon')->middleware('admin');
Route::post('/edit-kupon/{kupon}', [KuponController::class, 'editKupon'])->name('edit-kupon')->middleware('admin');
Route::post('aktifkan-kupon', [KuponController::class, 'aktifkanKupon'])->name('aktifkan-kupon');
//Route::post('tambah-kupon', [KuponController::class, 'tambah_kupon'])->name('tambah-kupon');

//pesanan
Route::get('checkout/{id}', [PesananController::class, 'checkout'])->name('checkout');
Route::get('add-to-keranjang/{id}', [PesananController::class, 'addToKeranjang'])->name('add-to-keranjang');
Route::delete('remove-from-cart', [PesananController::class, 'removeCart'])->name('removeCart');
Route::patch('update-cart', [PesananController::class, 'updateCart'])->name('updateCart');
Route::post('process-checkout', [PesananController::class, 'processCheckout'])->name('process-checkout');
Route::get('province/{id}', [PesananController::class, 'getKota'])->name('getKota');
Route::get('keranjang', [PesananController::class, 'keranjang'])->name('keranjang');
Route::post('konfirmasi', [PesananController::class, 'konfirmasi'])->name('konfirmasi');
Route::get('konfirmasi-pesanan/{id}', [PesananController::class, 'showKonfirmasiPesanan'])->name('konfirmasi-pesanan');
Route::post('konfirmasi-pembayaran', [PesananController::class, 'konfirmasiPembayaran'])->name('konfirmasi-pembayaran');
Route::get('api/getKurir/{tujuan}/{awal}/{berat}', [PesananController::class, 'getKurir']);
Route::get('/daftar-pesanan', [PesananController::class, 'daftar_pesanan'])->name('daftar-pesanan')->middleware('admin');


//gudang
Route::post('add-gudang', [GudangController::class, 'store'])->name('add-gudang')->middleware('admin');
Route::get('tambah-gudang', [GudangController::class, 'create'])->name('tambah-gudang')->middleware('admin');
Route::get('/daftar-gudang', [GudangController::class, 'daftar_gudang'])->name('daftar-gudang')->middleware('admin');

//buku
Route::post('/add-product', [BukuController::class, 'store'])->name('add-product')->middleware('admin');
Route::get('/daftar-produk', [BukuController::class, 'daftar_produk'])->name('daftar-produk')->middleware('admin');
Route::get('/pencarian', [BukuController::class, 'pencarian'])->name('pencarian');


//auth
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/auth-login', [LoginController::class, 'authenticate'])->name('auth-login');
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/auth-register', [RegisterController::class, 'store'])->name('auth-register');
Route::get('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/');
})->name('logout');

//email
Route::get('/pesanan-baru',[MailController::class, 'pesananBaru']);

//resources
Route::resource('kupons', KuponController::class);
Route::resource('bukus', BukuController::class);
Route::resource('pesanan', PesananController::class);
Route::resource('gudangs', GudangController::class);
Route::resource('users', UserController::class);
Route::resource('homes', HomeController::class);
Route::resource('mails', MailController::class);



//view
Route::get('/single-product', function(){
    return view('single-product');
});
Route::get('/category', function(){
    return view('category');
});
Route::get('tambah-kupon', function(){
    return view('admin.tambah_kupon');
})->middleware('admin');
Route::get('pengaturan', function(){
    return view('admin.pengaturan');
})->middleware('admin');
Route::get('dashboard', function(){
    return view('admin.dashboard');
})->middleware('admin');

