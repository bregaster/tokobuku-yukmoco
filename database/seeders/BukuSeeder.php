<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i=1;$i<10;$i++){
            DB::table('buku')->insert([
                'judul_buku' => $faker->sentence(3),
                'kategori' => $faker->word(),
                'deskripsi'=>$faker->paragraph(),
                'status'=>$faker->boolean(),
                'harga'=>$faker->numberBetween(50000,300000),
                'harga_diskon'=>$faker->numberBetween(50000,300000),
                'jumlah_stok'=>$faker->numberBetween(20-50),
                'gambar' => $faker->imageUrl(480, 640, 'book', true),
                'id_gudang' => $faker->numberBetween(1,9)
            ]);
        }
    }
}
