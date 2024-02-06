<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorarioDisponiblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horario_disponibles', function (Blueprint $table) {
            $table->id();
            $table->datetime('inicio');
            $table->datetime('fin');
            $table->unsignedBigInteger('dia-semanas_id')->nullable();
            $table->foreign('dia-semanas_id')->references('id')->on('dia-semanas')->onDelete('cascade');
            $table->unsignedBigInteger('doctors_id')->nullable();
            $table->foreign('doctors_id')->references('id')->on('doctors')->onDelete('cascade');
          

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
        Schema::dropIfExists('horario_disponibles');
    }
}
