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
        Schema::create('kupon', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama_kupon');
            $table->string('kode_kupon');
            $table->string('tipe_kupon');
            $table->integer('diskon_presentase');
            $table->integer('diskon_fix');
            $table->boolean('status');
            $table->dateTime('tanggal_mulai');
            $table->dateTime('tanggal_selesai');
            $table->unsignedBigInteger('id_buku');
            $table->foreign('id_buku')->references('id')->on('buku')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kupon');
    }
};
