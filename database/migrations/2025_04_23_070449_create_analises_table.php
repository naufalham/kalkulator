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
        Schema::create('analises', function (Blueprint $table) {
            $table->id('id_analisis');
            $table->string('nama_input');
            $table->enum('kategori', ['Pendapatan', 'Pengeluaran']);

            $table->unsignedBigInteger('usaha_id');
            $table->foreign('usaha_id')->references('id_usaha')->on('usahas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analises');
    }
};
