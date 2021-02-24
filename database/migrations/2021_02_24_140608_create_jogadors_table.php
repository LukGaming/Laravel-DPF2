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
            $table->string('frase_perfil');
            $table->longText('descricao_perfil_jogador');
            $table->string('funcao_primaria');
            $table->string('funcao_secundaria');
            $table->string('funcao_adicional');
            $table->integer('ativo');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('gamersclub');
            $table->string('faceit');
            $table->string('twitter');
            $table->string('steam');
            $table->string('twitch');
            $table->string('email_contato');
            $table->foreignId('user_id')->constrained();
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
