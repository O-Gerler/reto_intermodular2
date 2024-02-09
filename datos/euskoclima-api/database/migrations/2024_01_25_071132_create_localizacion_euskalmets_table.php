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
        Schema::create('localizaciones_euskalmet', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedBigInteger('id_zona_euskalmet');
            $table->foreign('id_zona_euskalmet')->references('id')->on('zona_euskalmet');
            $table->timestamps();
        });
    }
// *Soy putisimo*
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('localizacion_euskalmets');
    }
};
