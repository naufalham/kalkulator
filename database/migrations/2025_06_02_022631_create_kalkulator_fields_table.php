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
        Schema::create('kalkulator_fields', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kalkulator_id');
            $table->string('nama_field'); // contoh: 'fixedCost'
            $table->string('label');      // contoh: 'Biaya Tetap (Rp)'
            $table->string('tipe')->default('number'); // tipe input: number, text, dsb
            $table->text('keterangan')->nullable();    // hint/penjelasan
            $table->text('opsi')->nullable(); // untuk pilihan radio, checkbox, select
            $table->integer('urutan')->default(0);
            $table->timestamps();

            $table->foreign('kalkulator_id')->references('id')->on('kalkulators')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kalkulator_fields');
    }
};
