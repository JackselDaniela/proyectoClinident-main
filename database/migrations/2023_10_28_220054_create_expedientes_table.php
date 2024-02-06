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
          

            $table->string('alergia_penicilina',255);
            $table->string('desc_alergia_p',255);
            $table->string('alergia_medicamento',255);
            $table->string('desc_alergia_m',255);
            $table->string('trat_actual',255);
            $table->string('desc_trat_actual',255);
            $table->string('gravidez',255);
            $table->string('desc_gravidez',255);
            $table->string('hemorragia',255);
            $table->string('desc_hemorragia',255);
            $table->string('desmayos',255);
            $table->string('desc_desmayos',255);
            $table->string('asma',255);
            $table->string('desc_asma',255);
            $table->string('diabetes',255);
            $table->string('desc_diabetes',255);
            $table->string('hipertension',255);
            $table->string('desc_hipertension',255);
            $table->string('epilepsia',255);
            $table->string('desc_epilepsia',255);
            $table->string('cancer_actual',255);
            $table->string('desc_cancer_actual',255);
            $table->string('cancer_pasado',255);
            $table->string('desc_cancer_pasado',255);
            $table->string('vih',255);
            $table->string('desc_vih',255);
            $table->string('inmunodeficiente',255);
            $table->string('desc_inmunodeficiente',255);
            $table->string('fumador',255);
            $table->string('desc_fumador',255);
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
