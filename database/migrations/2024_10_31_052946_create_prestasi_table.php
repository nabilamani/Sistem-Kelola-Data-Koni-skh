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
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->string('sport_category'); // Kategori olahraga
            $table->string('event_type'); // Kelompok cabor (contoh: ganda-putri, ganda-putra)
            $table->string('athlete_name'); // Nama atlet
            $table->text('description')->nullable(); // Keterangan prestasi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('achievements');
    }
};
