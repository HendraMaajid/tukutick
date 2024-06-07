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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->float('jml_transaksi');
            $table->unsignedBigInteger('id_pemenang'); //foreign key dari tabel pemenang
            $table->foreign('id_pemenang')->references('id_pemenang')->on('pemenang');
            $table->unsignedInteger('metode_pembayaran'); // Tambahkan kolom untuk metode_pembayaran yang bertipe integer
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
