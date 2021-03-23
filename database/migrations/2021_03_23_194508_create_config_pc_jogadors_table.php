<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigPcJogadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_pc_jogadors', function (Blueprint $table) {
            $table->unsignedBigInteger("id_jogador");
            $table->string("monitor")->nullable();
            $table->string("teclado")->nullable();
            $table->string("mouse")->nullable();
            $table->string("mousepad")->nullable();
            $table->string("processador")->nullable();
            $table->string("placa_mae")->nullable();
            $table->string("placa_de_video")->nullable();
            $table->string("memoria_ram")->nullable();
            $table->string("fonte")->nullable();
            $table->string("gabinete")->nullable();
            $table->string("caminho_imagem_pc_jogador")->nullable();
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
        Schema::dropIfExists('config_pc_jogadors');
    }
}
