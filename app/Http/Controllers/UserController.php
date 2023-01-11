<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Models\User as User;
use App\Services\RajaOngkirServices;

class UserController extends Controller
{
    public function daftar_user(){
        return view('admin/daftar_user', ['users' => User::getUserData()]);
    }
    public function show($id){
        $user = User::find($id);
        $listpesanan = Pesanan::getListPesanan($id);
        $listpesananGrouped = $listpesanan->groupBy('id_pesanan');
        $namakotaprovinsi = RajaOngkirServices::getNamaKota($user->kode_kota,$user->kode_provinsi);
        return view('info-akun',['user'=>$user, 'listpesanan'=>$listpesananGrouped, 'namakotaprovinsi'=>$namakotaprovinsi]);
    }
}
