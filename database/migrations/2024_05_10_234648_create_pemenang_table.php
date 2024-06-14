<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pemenang', function (Blueprint $table) {
            $table->id('id_pemenang');
            $table->string('status_transaksi');
            $table->unsignedBigInteger('id_transaksi')->nullable(); //foreign key dari tabel transaksi, ini boleh null karna 
            //saat membuat isi dari tabel pemenang otomasi belum ada transaksi yang dilakukan
            //$table->foreign('id_transaksi')->references('id_transaksi')->on('transaksi');
            $table->unsignedBigInteger('id_customer'); //foreign key dari tabel customer
            $table->foreign('id_customer')->references('id_customer')->on('customer')->onDelete('cascade');
            $table->unsignedBigInteger('id_event'); //foreign key dari tabel event
            $table->foreign('id_event')->references('id_event')->on('event')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemenang');
    }
};
