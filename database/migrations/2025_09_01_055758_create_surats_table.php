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
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat');
            $table->string('nomor_agenda');
            $table->string('perihal');
            $table->date('tanggal');
            $table->string('pengirim');
            $table->string('bagian');
            $table->text('keterangan')->nullable();
            $table->string('file_path')->nullable();
            $table->enum('jenis', ['masuk', 'keluar']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
