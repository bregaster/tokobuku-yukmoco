<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kupon extends Model
{
    use HasFactory;
    protected $table = 'kupon';
    protected $fillable = ['nama_kupon', 'kode_kupon', 'diskon_fix', 'status', 'tanggal_mulai','tanggal_selesai','id_buku'];
    public function tambah_kupon(Request $request){
            $blog = $this->create([
            'title'     => $request->title,
            'content'   => $request->content
        ]);
    }
    protected function getKuponData(){
        $data= $this->all();
        return $data;
    }

}
