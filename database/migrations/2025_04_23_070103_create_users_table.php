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
        Schema::create('create_user_tables', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('nama');
            $table->string('email');
            $table->string('kata_sandi');
            $table->enum('role', ['admin', 'user'])->default('user');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('create_user_tables');
    }
};
