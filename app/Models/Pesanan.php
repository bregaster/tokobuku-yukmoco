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
                            'total_ongkos_kirim',
                            'alamat_penerima',
                            'no_telepon',
                            'id_user',
                            ];
}
