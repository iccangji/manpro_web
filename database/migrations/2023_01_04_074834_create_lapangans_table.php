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
        Schema::create('lapangans', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->unique();
            $table->string('pemilik');
            $table->string('alamat');
            $table->string('olahraga');
            $table->string('fitur');
            $table->bigInteger('tarif');
            $table->integer('jumlah');
            $table->integer('hari_libur')->nullable();
            $table->time('jam_buka');
            $table->time('jam_tutup');
            $table->time('jam_istirahat')->nullable();
            $table->time('jam_buka_kembali')->nullable();
            $table->string('maps', 100)->nullable();
            $table->string('gambar1');
            $table->string('gambar2');
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
        Schema::dropIfExists('futsals');
    }
};
