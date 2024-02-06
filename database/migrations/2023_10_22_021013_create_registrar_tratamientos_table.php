<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrarTratamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrar_tratamientos', function (Blueprint $table) {
            $table->id();
            $table->string('nom_tratamiento',255);
            $table->string('costo_tratamiento',100);
            $table->string('codigo_tratamiento',100);
            $table->string('fecha_añadido',100);
            
            $table->foreign('especialidads_id')->references('id')->on('especialidads')->onDelete('cascade');
            $table->unsignedBigInteger('especialidads_id');
           


            $table->softdeletes();
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
        Schema::dropIfExists('registrar_tratamientos');
    }
}
