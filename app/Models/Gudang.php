<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    use HasFactory;
    protected $table = 'gudang';
    protected $fillable = ['nama_gudang','alamat_gudang','kode_pos'];
    
    protected function getGudangData(){
        $data= $this->all();
        return $data;
    }
}
