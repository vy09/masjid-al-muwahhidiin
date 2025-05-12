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
        Schema::create('kegiatan_masjids', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan');
            $table->string('nama_pengisi')->nullable();
            $table->text('deskripsi')->nullable();
            $table->date('tanggal_kegiatan');
            $table->time('waktu_mulai')->nullable();
            $table->time('waktu_selesai')->nullable(); // added new column for end time
            $table->string('tempat_kegiatan')->nullable();
            // $table->enum('tipe_kegiatan', ['jumatan', 'umum', 'pengajian', 'kegiatan sosial', 'kegiatan lainnya']);
            $table->string('gambar')->nullable(); // simpan nama file/folder di storage
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan_masjids');
    }
};
