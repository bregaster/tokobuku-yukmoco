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
        Schema::create('produk_pesanan', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('jumlah');
            $table->unsignedBigInteger('id_pesanan');
            $table->unsignedBigInteger('id_buku');
            $table->unsignedBigInteger('id_user');
            $table->boolean('status_keranjang');
            $table->foreign('id_pesanan')->references('id')->on('pesanan')->onDelete('cascade');
            $table->foreign('id_buku')->references('id')->on('buku')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk_pesanan');
    }
};
