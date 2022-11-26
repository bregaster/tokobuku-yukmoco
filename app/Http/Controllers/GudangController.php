<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use Illuminate\Http\Request;

class GudangController extends Controller
{
    public function tambah_gudang(Request $request)
    {
        $this->validate($request, [
            'nama'     => 'required',
            'alamat'   => 'required',
            'kodepos'     => 'required|numeric',
        ],
        [
            'nama.required'=>'Ini messagenya'
        ]);
        $status = false;
        if($request->status == "aktif"){
            $status = true; 
        };
        //upload image
        $gudang = Gudang::create([
            'nama_gudang' => $request->nama,
            'alamat_gudang' => $request->alamat,
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
        return view('gudangs.create');
    }
  
  
    public function show(gudang $gudang)
    {
        return view('admin.daftar_gudang',['gudangs' => gudang::getgudangData()]);
    }
  
    public function edit(gudang $gudang)
    {
        return view('admin.edit_gudang',compact('gudang'));
    }

    public function update(Request $request, gudang $gudang)
    {
        $this->validate($request, [
            'nama'     => 'required',
            'alamat'   => 'required',
            'kodepos'     => 'required|numeric',
        ],
        [
            'nama.required'=>'Ini messagenya'
        ]);
        $status = false;
        if($request->status == "aktif"){
            $status = true; 
        };
        //upload image
        $gudang->update([
            'nama_gudang' => $request->nama,
            'alamat_gudang' => $request->alamat,
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
