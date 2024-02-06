<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCambioContrasenasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cambio_contrasenas', function (Blueprint $table) {
            $table->id();
            $table->string('vieja_contraseña',255);
            $table->string('nueva_contraseña',255);
            $table->string('confirmar_contraseña',255);
            
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
        Schema::dropIfExists('cambio_contrasenas');
    }
}
