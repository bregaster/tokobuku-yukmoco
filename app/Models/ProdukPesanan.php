<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukPesanan extends Model
{
    use HasFactory;
    protected $table = 'produk_pesanan';
    protected $fillable = [
        'id',
        'jumlah',
        'id_pesanan',
        'id_buku',
        'status_keranjang',
        'id_user'
    ];

    protected function getKeranjang($id){
        $data = $this->join('buku','buku.id','=','produk_pesanan.id_buku')
            ->join('gudang','gudang.id','=','buku.id_gudang')
            ->where('id_pesanan',$id)
            ->orderBy('id_gudang', 'asc')
            ->get();
        return $data;
    }
}
