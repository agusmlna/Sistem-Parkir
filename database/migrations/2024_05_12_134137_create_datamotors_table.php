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
        Schema::create('motors', function (Blueprint $table) {
            $table->id();
            $table->string('motor');
            $table->string('plat_nomor');
            $table->string('properti')->nullable();
            $table->dateTime('jam_masuk');
            $table->dateTime('jam_keluar')->nullable();
            $table->string('tipe_motor');
            $table->int('biaya');
            $table->string('status');
            $table->string('komplain')->nullable();
            $table->string('bukti_bayar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motors');
    }
};
