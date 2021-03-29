<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('times', function (Blueprint $table) {
            $table->id();
            $table->string("nome")->unique();
            $table->string("frase")->nullable();
            $table->longText("descricao")->nullable();
            $table->integer("ativo")->default(1);
            $table->integer("numero_membros")->nullable();
            $table->string("facebook")->nullable();
            $table->string("instagram")->nullable();
            $table->string("gamersclub")->nullable();
            $table->string("faceit")->nullable();
            $table->string("steam")->nullable();
            $table->string("twitch")->nullable();
            $table->string("email")->nullable();
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('times');
    }
}
