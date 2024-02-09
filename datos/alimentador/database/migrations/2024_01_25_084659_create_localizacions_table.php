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
        Schema::create('localizaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->string('latitud');
            $table->string('longitud');
            $table->string('cod_el_tiempo');
            $table->unsignedBigInteger('id_localizacion_euskalmet');
            $table->foreign('id_localizacion_euskalmet')->references('id')->on('localizaciones_euskalmet');
            $table->unsignedBigInteger('id_zona_el_tiempo');
            $table->foreign('id_zona_el_tiempo')->references('id')->on('zona_el_tiempo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('localizacions');
    }
};
