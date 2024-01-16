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
        Schema::create('j_lapangan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lapangan_id');
            $table->string('nama_lapangan');
           
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('j_lapangan');
    }
};