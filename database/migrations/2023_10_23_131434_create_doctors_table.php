<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('personas_id');
            
            $table->unsignedBigInteger('especialidads_id')->nullable();
            
            $table->foreign('personas_id')->references('id')->on('personas')->onDelete('cascade');
           
            $table->foreign('especialidads_id')->references('id')->on('especialidads')->onDelete('cascade');

            //Datos Academicos

            $table->string('universidad',255);
            $table->string('experiencia',255);
            $table->string('bachillerato',255);
            $table->string('destacado',255);

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
        Schema::dropIfExists('doctors');
    }
}
