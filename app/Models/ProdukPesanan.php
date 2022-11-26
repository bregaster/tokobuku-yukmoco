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

    protected function getKeranjangData($id){
        $data = $this->join('buku','buku.id','=','produk_pesanan.id_buku')
            ->where('id_user',$id)
            ->get();
        return $data;
    }
}
