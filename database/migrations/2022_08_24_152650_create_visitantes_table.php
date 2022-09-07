<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitantes', function (Blueprint $table) {
            $table->id('visitantes_id');
            $table->date('fecha_reg')->nullable();
            $table->string('cedula');
            $table->string('nombres');
            $table->string('observacion')->nullable();
            $table->string('razon_v');
            $table->string('anunciar');
            $table->string('sitio_r');
            $table->string('sitio_s')->nullable();
            $table->string('estatus');
            $table->time('hora_e');
            $table->time('hora_s')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitantes');
    }
};
