<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensagensTimeJogadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensagens_time_jogadors', function (Blueprint $table) {
            $table->id();
            $table->longText("body"); //Corpo da mensagem
            $table->bigInteger("id_time");
            $table->bigInteger("id_jogador");
            $table->bigInteger('user_id');
            $table->integer('visualizado_pelo_time');
            $table->integer('visualizado_pelo_jogador');
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
        Schema::dropIfExists('mensagens_time_jogadors');
    }
}
