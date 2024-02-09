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
        Schema::create('mediciones', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('hora');
            $table->float('temp');
            $table->float('temp_max');
            $table->float('temp_min');
            $table->integer('humedad');
            $table->float('viento');
            $table->float('precipitacion');
            $table->unsignedBigInteger('id_localizacion');
            $table->foreign('id_localizacion')->references('id')->on('localizaciones');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicions');
    }
};
