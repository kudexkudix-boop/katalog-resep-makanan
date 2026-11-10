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
    Schema::create('reseps', function (Blueprint $table) {
        $table->id();
        $table->string('nama_resep');
        $table->text('deskripsi');
        $table->text('bahan');
        $table->text('langkah');
        $table->integer('waktu_memasak');
        $table->string('gambar')->nullable();
        $table->timestamps();
    });
    }
};
