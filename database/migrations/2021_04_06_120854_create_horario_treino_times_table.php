<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorarioTreinoTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horario_treino_times', function (Blueprint $table) {
            $table->id();
            $table->string("dia_da_semana");
            $table->time("horario_inicio");
            $table->time("horario_fim");
            $table->unsignedBigInteger("id_time");
            $table->foreign('id_time')->references('id')->on('times');
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
        Schema::dropIfExists('horario_treino_times');
    }
}
