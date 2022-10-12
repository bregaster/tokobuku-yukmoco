<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
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
            DB::table('users')->insert([
                'name' => $faker->name($gender ='male'|'female'),
                'email'=>$faker->email(),
                'email_verified_at'=>$faker->dateTimeBetween('-10 day' ),
                'password'=>$faker->password(),
                'alamat'=>$faker->address(),
                'kode_pos' => $faker->numberBetween(43100,49000),
                'no_telepon' => $faker->phoneNumber(),
                'created_at' => $faker->dateTimeBetween('-10 day' ),
                'updated_at' => $faker->dateTimeBetween('-5 day' )

            ]);
        }
    }
}
