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
        Schema::create('kondisi', function (Blueprint $table) {
            $table->string('id');
            $table->string('nilai_huruf');
            $table->string('nilai_min');
            $table->string('nilai_max');
            $table->string('id_waktu');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kondisi');
    }
};
