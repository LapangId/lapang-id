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
        Schema::create('lapangan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('jenis_lapangan');
            $table->string('nama_lapangan');
            $table->string('deskripsi');
            $table->string('harga_sewa');
            $table->string('lokasi');
            $table->string('gambar');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lapangan');
    }
};