<?php

namespace App\Http\Controllers;
use App\Models\Kupon as Kupon;
use Illuminate\Http\Request;

class KuponController extends Controller
{
        public function tambah_kupon(Request $request)
    {
        $this->validate($request, [
            'nama'     => 'required',
            'kodekupon'   => 'required',
            'jumlahdiskon'     => 'required|numeric',
            'jumlahkupon'   =>'required|numeric',
            'status'   => 'required',
            'tglmulai' => 'required',
            'tglselesai' => 'required'
        ],
        [
            'nama.required'=>'Ini messagenya'
        ]);
        $status = false;
        if($request->status == "aktif"){
            $status = true; 
        };
        //upload image
        $kupon = Kupon::create([
            'nama_kupon' => $request->nama,
            'kode_kupon' => $request->kodekupon,
            'diskon_fix' => $request->jumlahdiskon,
            'status' => $status,
            'tanggal_mulai' => $request->tglmulai,
            'tanggal_selesai' => $request->tglselesai,
            'id_buku'=>1,
        ]);



        if($kupon){
            //redirect dengan pesan sukses
            return redirect()->route('daftar-kupon')->with(['success' => 'Kupon berhasil ditambahkan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('tambah-kupon')->with(['error' => 'Kupon Gagal Disimpan!']);
        }
    }
    public function daftar_kupon(){
        return view('admin/daftar_kupon', ['kupons' => Kupon::getKuponData()]);
    }
}
