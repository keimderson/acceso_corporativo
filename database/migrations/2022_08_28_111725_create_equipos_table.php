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
        Schema::create('equipos', function (Blueprint $table) {
            $table->id('equipos_id');
            $table->string('cedula');
            $table->string('nombres');
            $table->string('razon');
            $table->string('equipo_des');
            $table->string('marca');
            $table->string('modelo');
            $table->string('sitio_r');
            $table->string('sitio_s')->nullable();
            $table->string('observacion')->nullable();
            $table->date('fecha_ingreso');
            $table->time('hora_ingreso');
            $table->date('fecha_salida')->nullable();
            $table->time('hora_salida')->nullable();
            $table->string('estatus');
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
        Schema::dropIfExists('equipos');
    }
};
