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
        Schema::create('kalkulators', function (Blueprint $table) {
            $table->id('id_kalkulator');
            $table->string('nama_kalkulator');
            $table->string('hasil');
            $table->date('tgl_hasil');

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
        Schema::dropIfExists('kalkulators');
    }
};
