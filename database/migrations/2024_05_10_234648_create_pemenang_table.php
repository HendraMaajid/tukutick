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
            $table->integer('id_transaksi');
            $table->integer('id_customer');
            $table->integer('id_event');
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
