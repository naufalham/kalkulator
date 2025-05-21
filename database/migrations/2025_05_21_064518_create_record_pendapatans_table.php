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
        Schema::create('record_pendapatans', function (Blueprint $table) {
            $table->id();
            $table->integer('value')->default(0);


            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('layanan_id')->constrained()->onDelete('cascade');
            $table->foreignId('nama_pendapatan_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('record_pendapatans');
    }
};
