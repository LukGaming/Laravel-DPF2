<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVagasTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vagas_times', function (Blueprint $table) {
            $table->id();
            $table->string('funcao');
            $table->longText('descricao');
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
        Schema::dropIfExists('vagas_times');
    }
}
