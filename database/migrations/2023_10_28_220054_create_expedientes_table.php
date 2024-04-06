<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpedientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('pacientes_id')->nullable();
            $table->foreign('pacientes_id')->references('id')->on('pacientes')->onDelete('cascade');


            $table->boolean('alergia_penicilina');
            $table->string('desc_alergia_p', 255);
            $table->boolean('alergia_medicamento');
            $table->string('desc_alergia_m', 255);
            $table->boolean('trat_actual');
            $table->string('desc_trat_actual', 255);
            $table->boolean('gravidez');
            $table->string('desc_gravidez', 255);
            $table->boolean('hemorragia');
            $table->string('desc_hemorragia', 255);
            $table->boolean('desmayos');
            $table->string('desc_desmayos', 255);
            $table->boolean('asma');
            $table->string('desc_asma', 255);
            $table->boolean('diabetes');
            $table->string('desc_diabetes', 255);
            $table->boolean('hipertension');
            $table->string('desc_hipertension', 255);
            $table->boolean('epilepsia');
            $table->string('desc_epilepsia', 255);
            $table->boolean('cancer_actual');
            $table->string('desc_cancer_actual', 255);
            $table->boolean('cancer_pasado');
            $table->string('desc_cancer_pasado', 255);
            $table->boolean('vih');
            $table->string('desc_vih', 255);
            $table->boolean('inmunodeficiente');
            $table->string('desc_inmunodeficiente', 255);
            $table->boolean('fumador');
            $table->string('desc_fumador', 255);
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
        Schema::dropIfExists('expedientes');
    }
}
