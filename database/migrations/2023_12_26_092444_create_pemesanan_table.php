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
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lapangan_id');
            $table->unsignedBigInteger('j_lapangan_id');
            $table->string('nama_p');
            $table->string('jam');
            $table->string('tanggal');
           
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pemesanan');
    }
};