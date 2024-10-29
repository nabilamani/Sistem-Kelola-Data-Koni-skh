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
        Schema::create('koni_structures', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama KONI personnel
            $table->string('position'); // Jabatan
            $table->integer('age'); // Umur
            $table->date('birth_date'); // Tanggal lahir
            $table->enum('gender', ['Laki-laki', 'Perempuan']); // Jenis kelamin
            $table->string('photo')->nullable(); // Foto
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
        Schema::dropIfExists('koni_structures');
    }
};
