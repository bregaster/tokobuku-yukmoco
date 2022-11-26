<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';
    protected $fillable = ['judul_buku','deskripsi','kategori','status','harga','hargasetelahdiskon','sku','berat','jumlah_stok','gambar','id_gudang',];
    use HasFactory;

    protected function getHomeData(){
        $data = $this->latest()->paginate(10); ;
        return $data;
    }
    protected function getListProduk(){
        $data = $this->select('id','judul_buku', 'kategori', 'harga', 'jumlah_stok')->get();
        return $data;
    }
}
