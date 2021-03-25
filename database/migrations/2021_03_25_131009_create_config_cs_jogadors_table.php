<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigCsJogadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_cs_jogadors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jogador');
            $table->string("resolucao")->nullable();
            $table->string("sensibilidade")->nullable();
            $table->string("crosshair")->nullable();
            $table->string("viewmodel")->nullable();
            $table->string("caminho_cfg")->nullable();
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
        Schema::dropIfExists('config_cs_jogadors');
    }
}
