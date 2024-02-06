<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacienteDiagnosticosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente_diagnosticos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pacientes_id')->nullable();
            $table->unsignedBigInteger('diagnosticos_id')->nullable();
            $table->unsignedBigInteger('piezas_id')->nullable();
            $table->unsignedBigInteger('registrar_tratamientos_id')->nullable();
            $table->unsignedBigInteger('estatus_tratamientos_id')->nullable();
            $table->foreign('pacientes_id')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('diagnosticos_id')->references('id')->on('diagnosticos')->onDelete('cascade');
            $table->foreign('piezas_id')->references('id')->on('piezas')->onDelete('cascade');
            $table->foreign('registrar_tratamientos_id')->references('id')->on('registrar_tratamientos')->onDelete('cascade');
            $table->foreign('estatus_tratamientos_id')->references('id')->on('estatus_tratamientos')->onDelete('cascade');
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
        Schema::dropIfExists('paciente_diagnosticos');
    }
}
