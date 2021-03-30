<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJogadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jogadors', function (Blueprint $table) {
            $table->string('nick_jogador');
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('frase_perfil')->nullable();
            $table->longText('descricao_perfil_jogador')->nullable();
            $table->string('funcao_primaria');
            $table->string('funcao_secundaria');
            $table->string('funcao_adicional');
            $table->integer('ativo');
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('gamersclub')->nullable();
            $table->string('faceit')->nullable();
            $table->string('twitter')->nullable();
            $table->string('steam')->nullable();
            $table->string('twitch')->nullable();
            $table->string('caminho_imagem_perfil_jogador')->nullable();
            $table->string('email_contato')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('jogadors');
    }
}
