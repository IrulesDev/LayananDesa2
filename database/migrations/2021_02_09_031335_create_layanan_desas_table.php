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
        Schema::create('layanan_desas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengajuan_id')->references('id')->on('pengajuan_layanans')->onDelete('cascade');
            $table->string('layanan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan_desas');
    }
};
