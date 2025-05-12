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
        Schema::create('kegiatan_jumats', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan');
            $table->string('nama_khatib')->nullable();
            $table->string('nama_muadzin')->nullable();
            $table->date('tanggal_kegiatan');
            $table->string('tempat_kegiatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan_jumats');
    }
};
