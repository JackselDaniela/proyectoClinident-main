<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalizacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localizacions', function (Blueprint $table) {
            $table->id();
             
            $table->string('pais',255);
            $table->string('moneda',255);
            $table->unsignedBigInteger('zona_horarias_id')->nullable();
            $table->unsignedBigInteger('lenguajes_id')->nullable();
            $table->unsignedBigInteger('codigo_pagos_id')->nullable();

            $table->foreign('zona_horarias_id')->references('id')->on('zona_horarias')->onDelete('cascade');
            $table->foreign('lenguajes_id')->references('id')->on('lenguajes')->onDelete('cascade');
            $table->foreign('codigo_pagos_id')->references('id')->on('codigo_pagos')->onDelete('cascade');

            
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
        Schema::dropIfExists('localizacions');
    }
}
