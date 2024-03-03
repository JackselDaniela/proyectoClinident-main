<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatoUbicacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dato_ubicacions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('estados_id');
            $table->foreign('estados_id')->references('id_estado')->on('estados')->onDelete('cascade');

            $table->unsignedBigInteger('municipios_id');
            $table->foreign('municipios_id')->references('id_municipio')->on('municipios')->onDelete('cascade');

            $table->unsignedBigInteger('ciudades_id');
            $table->foreign('ciudades_id')->references('id_ciudad')->on('ciudads')->onDelete('cascade');
            
            $table->unsignedBigInteger('parroquias_id');
            $table->foreign('parroquias_id')->references('id_parroquia')->on('parroquias')->onDelete('cascade');

            $table->string('direccion',100);
            $table->string('telefono',100);
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
        Schema::dropIfExists('dato_ubicacions');
    }
}
