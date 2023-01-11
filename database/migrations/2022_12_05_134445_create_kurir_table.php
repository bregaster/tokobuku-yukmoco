<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kurir', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama_kurir');
            $table->string('nama_servis');
            $table->integer('ongkir');
            $table->string('kode_prov_asal');
            $table->string('kode_kota_asal');
            $table->string('kode_prov_tujuan');
            $table->string('kode_kota_tujuan');
            $table->unsignedBigInteger('id_pesanan');
            $table->foreign('id_pesanan')->references('id')->on('pesanan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kurir');
    }
};
