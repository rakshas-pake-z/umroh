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
        Schema::create('form_umroh', function(Blueprint $table) {
            $table->id();
            $table->date('tgl_daftar'); 
            $table->string('nama');
            $table->string('alamat');
            $table->string('email');
            $table->string('no_hp');
            $table->date('tgl_berangkat'); 
            $table->bigInteger('jml_jamaah');
            $table->text('keterangan');
            $table->string('room');
            $table->unsignedBigInteger('paket_id');
            $table->foreign('paket_id')->references('id')->on('paket')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_umroh');
    }
};
