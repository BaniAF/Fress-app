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
        Schema::create('peserta', function (Blueprint $table) {
            $table->string('id');
            $table->string('nama');
            $table->string('username');
            $table->string('alamat');
            $table->string('email');
            $table->string('password')->bcrypt();
            $table->string('password_lihat');
            $table->string('posisi');
            $table->string('klub');
            $table->string('id_waktu')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peserta');
    }
};
