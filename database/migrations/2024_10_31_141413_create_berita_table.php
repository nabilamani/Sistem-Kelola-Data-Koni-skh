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
        Schema::create('berita', function (Blueprint $table) {
            $table->string('id')->primary(); // Auto-incrementing ID
            $table->string('judul_berita'); // Judul Berita
            $table->date('tanggal_waktu'); // Tanggal dan Waktu
            $table->string('lokasi_peristiwa'); // Lokasi Peristiwa
            $table->longText('isi_berita')->nullable(); // Isi Berita
            $table->string('kutipan_sumber')->nullable(); // Kutipan/Sumber
            $table->string('photo')->nullable(); // Foto
            $table->timestamps(); // Timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berita');
    }
};
