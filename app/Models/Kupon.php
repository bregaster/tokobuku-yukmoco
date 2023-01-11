<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kupon extends Model
{
    use HasFactory;
    protected $table = 'kupon';
    protected $fillable = ['nama_kupon', 'kode_kupon','jumlah_kupon', 'diskon_fix', 'status', 'tanggal_mulai','tanggal_selesai'];

    protected function getKuponData(){
        $data= $this->all();
        return $data;
    }
    protected function cariKupon($kodekupon){
        $data= $this->where('kode_kupon',$kodekupon)->first();
        return $data;
    }

}
