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
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('judul_buku');
            $table->string('kategori');
            $table->text('deskripsi');
            $table->boolean('status');
            $table->integer('harga');
            $table->integer('harga_diskon');
            $table->integer('jumlah_stok');
            $table->string('gambar');
            $table->unsignedBigInteger('id_gudang');
            $table->foreign('id_gudang')->references('id')->on('gudang')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buku');
    }
};
