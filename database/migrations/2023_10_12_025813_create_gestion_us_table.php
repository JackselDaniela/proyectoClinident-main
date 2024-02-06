<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGestionUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gestion_us', function (Blueprint $table) {
            $table->id();
            $table->string('nom_empresa',255);
            $table->string('fax',255);
            $table->string('website',255);

             
            $table->unsignedBigInteger('dato_ubicacions_id')->nullable();
            $table->foreign('dato_ubicacions_id')->references('id')->on('dato_ubicacions')->onDelete('cascade');

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
        Schema::dropIfExists('gestion_us');
    }
}
