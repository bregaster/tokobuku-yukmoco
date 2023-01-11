<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use App\Services\RajaOngkirServices;
use Illuminate\Http\Request;

class GudangController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama'     => 'required',
            'alamat'   => 'required',
            'provinsi'   => 'required',
            'kota'   => 'required',
            'kodepos'     => 'required|numeric',
        ],
        [
            'nama.required'=>'Ini messagenya'
        ]);

        //upload image
        $gudang = Gudang::create([
            'nama_gudang' => $request->nama,
            'alamat_gudang' => $request->alamat,
            'kode_provinsi' => $request->provinsi,
            'kode_kota' => $request->kota,
            'kode_pos' => $request->kodepos
        ]);



        if($gudang){
            //redirect dengan pesan sukses
            return redirect()->route('daftar-gudang')->with(['success' => 'gudang berhasil ditambahkan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('tambah-gudang')->with(['error' => 'gudang Gagal Disimpan!']);
        }
    }
    public function daftar_gudang(){
        return view('admin/daftar_gudang', ['gudangs' => Gudang::getGudangData()]);
    }
    
    public function create()
    {
        $provinsi = RajaOngkirServices::getProvinsi();
        return view('admin.tambah_gudang', ['provinsi' => $provinsi]);
    }
  
  
    public function show(gudang $gudang)
    {
        return view('admin.daftar_gudang',['gudangs' => gudang::getgudangData()]);
    }
  
    public function edit(gudang $gudang)
    {  
        $provinsi = RajaOngkirServices::getProvinsi();
        $kota = RajaOngkirServices::getKota($gudang->kode_provinsi);
        return view('admin.edit_gudang',['provinsi' => $provinsi,'kota'=>$kota, 'gudang'=>$gudang]);
    }

    public function update(Request $request, gudang $gudang)
    {
        $this->validate($request, [
            'nama'     => 'required',
            'alamat'   => 'required',
            'provinsi'   => 'required',
            'kota'   => 'required',
            'kodepos'     => 'required|numeric',
        ],
        [
            'nama.required'=>'Nama gudang tidak boleh kosong',
            'alamat.required'=>'Nama gudang tidak boleh kosong',
            'provinsi.required'=>'Nama gudang tidak boleh kosong',
            'kota.required'=>'Nama gudang tidak boleh kosong'
        ]);
        $gudang->update([
            'nama_gudang' => $request->nama,
            'alamat_gudang' => $request->alamat,
            'kode_provinsi' => $request->provinsi,
            'kode_kota' => $request->kota,
            'kode_pos' => $request->kodepos
        ]);
        return redirect()->route('daftar-gudang')
                        ->with('success','gudang updated successfully');
    }

    public function destroy(gudang $gudang)
    {
        
        $gudang->delete();
        return redirect()->route('daftar-gudang')
                        ->with('success','gudang deleted successfully');
    }
}
