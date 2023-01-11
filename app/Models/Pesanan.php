<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $table ='pesanan';
    protected $fillable = ['nama_pemesan',
                            'email',
                            'status',
                            'jumlah_item',
                            'jumlah_supplier',
                            'total_pesanan',
                            'total_diskon',
                            'alamat_penerima',
                            'kode_pos',
                            'kode_provinsi_penerima',
                            'kode_kota_penerima',
                            'no_telepon',
                            'is_checkout',
                            'id_user',
                            'id_kupon',
                            'bukti_konfirmasi',
                            ];

    protected function getListPesanan($id){
        $data = $this->join('produk_pesanan','pesanan.id','=','produk_pesanan.id_pesanan')
            ->join('buku','buku.id','=','produk_pesanan.id_buku')
            ->where('pesanan.id_user',$id)
            ->orderBy('pesanan.created_at', 'asc')
            ->get();
        return $data;
    }
    protected function getListAllPesanan(){
        $data = $this->select('id','nama_pemesan', 'jumlah_item', 'total_pesanan','no_telepon',  'bukti_konfirmasi')->get();
        return $data;
    }
}
