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
        Schema::create('galeris', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('judul_galeri'); // Title of gallery item
            $table->text('deskripsi')->nullable(); // Optional description
            $table->string('media_type'); // Type of media (photo or video)
            $table->string('media_path'); // Path to the media file (photo/video)
            $table->string('kategori')->nullable(); // Category
            $table->date('tanggal'); // Date
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
        Schema::dropIfExists('galeris');
    }
};
