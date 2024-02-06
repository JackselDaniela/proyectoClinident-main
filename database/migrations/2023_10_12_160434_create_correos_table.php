<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorreosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('correos', function (Blueprint $table) {
            $table->id();
            
            $table->string('correo_protocolo',255);
            $table->string('correo_emisor',255);
            $table->string('nombre_emisor',255);
            $table->string('host_protocolo',255);
            $table->string('protocolo_usuario',255);
            $table->string('protocolo_config',255);
            $table->string('protocolo_puerto',255);
            $table->string('protocolo_dominio',255); 

            $table->unsignedBigInteger('smtp_configs_id')->nullable();
            $table->foreign('smtp_configs_id')->references('id')->on('smtp_configs')->onDelete('cascade');

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
        Schema::dropIfExists('correos');
    }
}
