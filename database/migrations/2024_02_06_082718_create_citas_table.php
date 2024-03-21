<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pacientes_id');
            $table->foreign('pacientes_id')->references('id')->on('pacientes')->onDelete('cascade');
            $table->unsignedBigInteger('doctors_id');
            $table->foreign('doctors_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->unsignedBigInteger('tipo_consultas_id');
            $table->foreign('tipo_consultas_id')->references('id')->on('tipo_consultas')->onDelete('cascade');
            
            $table->time('inicio');
            $table->time('fin');
            $table->date('fecha');
            $table->string('descripcion');
            $table->timestamp('confirmacion')->nullable();
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
        Schema::dropIfExists('citas');
    }
}
