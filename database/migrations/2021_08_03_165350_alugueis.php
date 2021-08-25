<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Alugueis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluguel', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome', 50);
            $table->string('endereco', 80);
            $table->string('email', 100);
            $table->integer('tamanho');
            $table->boolean('animal');
            $table->integer('valor');
            $table->integer('comodos');
            $table->integer('banheiros');
            $table->string('descricao', 300);
            $table->boolean('fumante');
            $table->integer('carros');
            $table->integer('dormitorios');
            $table->bigInteger('alugado')->unsigned()->nullable();
            $table->foreign('alugado')->references('id')->on('usuario')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aluguel');
    }
}
