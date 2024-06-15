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
        Schema::create('event', function (Blueprint $table) {
            $table->id('id_event');
            $table->string('nama_event');
            $table->longText('deskripsi_event');
            $table->string('gambar');
            $table->date('tgl_event');
            $table->time('jam_event');
            $table->text('lokasi');
            $table->integer('jml_ticket');
            $table->float('hrg_ticket');
            $table->string('status');
            $table->unsignedBigInteger('id_kategori'); //foreign key dari tabel kategori
            $table->foreign('id_kategori')->references('id_kategori')->on('kategori')->onDelete('cascade');
            $table->unsignedBigInteger('id_penyelenggara'); //foreign key dari tabel penyelenggara
            $table->foreign('id_penyelenggara')->references('id_penyelenggara')->on('penyelenggara')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event');
    }
};
