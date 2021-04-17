<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConviteJogadoresTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convite_jogadores_times', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_time');
            $table->unsignedBigInteger('id_jogador');
            $table->foreign('id_time')->references('id')->on('times');
            $table->foreign('id_jogador')->references('user_id')->on('jogadors');
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
        Schema::dropIfExists('convite_jogadores_times');
    }
}
