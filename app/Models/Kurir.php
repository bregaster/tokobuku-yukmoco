<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurir extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table ='kurir';
    protected $fillable = ['nama_kurir','nama_servis','ongkir','id_pesanan','id_gudang'];

    protected function getKurirPesanan($id){
        $data = $this->join('pesanan','pesanan.id','=','kurir.id_pesanan')
            ->join('gudang','gudang.id','=','kurir.id_gudang')
            ->where('id_pesanan',$id)
            ->orderBy('id_gudang', 'asc')
            ->first();
        return $data;
    }
}
