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
        Schema::create('table_ppic', function (Blueprint $table) {
            $table->id();
            $table->string('kode_item'); 
            $table->string('plant');
            $table->string('unit');
            $table->string('kiln');
            $table->float('persen');
            $table->integer('isi');
            $table->string('lower_punch');
            $table->string('upper_punch');
            $table->string('merk');
            $table->integer('size');
            $table->string('motif');
            $table->string('le');
            $table->string('kode_komposisi');
            $table->float('total_komposisi');
            $table->float('berat_kering');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_ppic');
    }
};
