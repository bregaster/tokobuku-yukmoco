<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku as Buku;
use App\Models\Gudang;
use Intervention\Image\ImageManagerStatic as Image;
class BukuController extends Controller
{
    public function store(Request $request){
        $this->validate($request, [
            'nama' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'visibilitas' => 'required',
            'hargasebelum' => 'required',
            'sku' => 'required',
            'berat' => 'required',
            'jumlahbarang' => 'required',
            'gudang' => 'required',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);
        $visibilitas = $request->visibilitas=="publish"? true:false;
        //upload gambar
        $image = $request->file('gambar');
        $input['imagename'] = time().'.'.$image->extension();
     
        $filePath = public_path('/thumbnails');
        $img = Image::make($image->path());
        $img->resize(640, null, function ($const) {
            $const->aspectRatio();
        })->save($filePath.'/'.$input['imagename']);

        $gambar = '/thumbnails/'.$input['imagename'];
        $buku = Buku::create([
            'judul_buku' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'status' => $visibilitas,
            'harga' => $request->hargasebelum,
            'harga_diskon' => $request->hargasetelah,
            'sku' => $request->sku,
            'berat' => $request->berat,
            'jumlah_stok' => $request->jumlahbarang,
            'gambar' => $gambar,
            'id_gudang'=>$request->gudang,
        ]);

        return redirect()->route('daftar-produk')->with(['success' => 'Buku berhasil ditambahkan!']);

    }

    public function daftar_produk(){
        return view('admin/daftar_produk', ['products' => Buku::getListProduk()]);
    }
    public function pencarian(Request $request){
        if($request->cari){
            $buku = Buku::getPencarian($request->cari);
            return view('cari',['buku' => $buku, 'katakunci'=>$request->cari]);
        }else{
            $buku = Buku::getKategori($request->kategori);
            return view('cari',['buku' => $buku, 'kategori'=>$request->kategori]);
        }
    }
    public function create()
    {
        $daftargudang=Gudang::getDaftarGudang();
        return view('admin.tambah_produk',['daftargudang'=> $daftargudang]);
    }
  
    public function show(buku $buku)
    {
        return view('admin.daftar_produk',['bukus' => buku::getbukuData()]);
    }
  
    public function edit(buku $buku)
    {
        $daftargudang=Gudang::getDaftarGudang();
        return view('admin.edit_produk',['buku'=>$buku,'daftargudang'=> $daftargudang]);
    }

    public function update(Request $request, buku $buku)
    {
        $this->validate($request, [
            'nama' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'visibilitas' => 'required',
            'hargasebelum' => 'required',
            'sku' => 'required',
            'berat' => 'required',
            'jumlahbarang' => 'required',
            'gudang' => 'required',
            'gambar' => 'image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);
        $visibilitas = $request->visibilitas=="publish"? true:false;
        //upload gambar
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $input['imagename'] = time().'.'.$image->extension();
        
            $filePath = public_path('/thumbnails');
            $img = Image::make($image->path());
            $img->resize(640, null, function ($const) {
                $const->aspectRatio();
            })->save($filePath.'/'.$input['imagename']);

            $gambar = '/thumbnails/'.$input['imagename'];
            $buku->update([
                'judul_buku' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'kategori' => $request->kategori,
                'status' => $visibilitas,
                'harga' => $request->hargasebelum,
                'hargasetelahdiskon' => $request->hargasetelah,
                'sku' => $request->sku,
                'berat' => $request->berat,
                'jumlah_stok' => $request->jumlahbarang,
                'gambar' => $gambar,
                'id_gudang'=>$request->gudang,
            ]);
        }else{
            $buku->update([
                'judul_buku' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'kategori' => $request->kategori,
                'status' => $visibilitas,
                'harga' => $request->hargasebelum,
                'hargasetelahdiskon' => $request->hargasetelah,
                'sku' => $request->sku,
                'berat' => $request->berat,
                'jumlah_stok' => $request->jumlahbarang,
                'id_gudang'=>$request->gudang,
            ]);
        }

        return redirect()->route('daftar-produk')
                        ->with('success','Data buku berhasi diubah');
    }

    public function destroy(buku $buku)
    {
        
        $buku->delete();
       
        return redirect()->route('daftar-produk')
                        ->with('success','Buku berhasil dihapus');
    }
}
