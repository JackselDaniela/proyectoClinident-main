<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoicitudIsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soicitud_is', function (Blueprint $table) {
            $table->id();
            $table->string('nom_insumo',255);
            $table->string('cod_insumo',255);
            $table->string('presentacion_insumo',255);
            $table->string('elaboracion_insumo',255);
            $table->string('vencimiento_insumo',255);
            $table->string('serial_insumo',255);
            $table->string('descripcion_insumo',255);
            $table->string('funcion_insumo',255);
            $table->string('foto_insumo',255);
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
        Schema::dropIfExists('soicitud_is');
    }
}
