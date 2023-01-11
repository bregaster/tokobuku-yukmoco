<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GudangSeeder extends Seeder
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
            DB::table('gudang')->insert([
                'nama_gudang' => $faker->sentence(2),
                'alamat_gudang' => $faker->address(),
                'kode_pos'=>$faker->numberBetween(63210,65000)

            ]);
        }
    }
}
