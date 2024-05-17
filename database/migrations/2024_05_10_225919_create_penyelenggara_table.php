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
        Schema::create('penyelenggara', function (Blueprint $table) {
             $table->id('id_penyelenggara');
            $table->string('nama_penyelenggara');
            $table->string('email_penyelenggara');
            $table->text('alamat_kantor');
            $table->string('kontak');
            $table->string('lisensi');
            $table->string('username');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyelenggara');
    }
};
