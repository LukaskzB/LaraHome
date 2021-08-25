<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vendas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venda', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome', 50);
            $table->string('endereco', 80);
            $table->string('email', 100);
            $table->integer('tamanho');
            $table->integer('comodos');
            $table->integer('carros');
            $table->integer('banheiros');
            $table->integer('dormitorios');
            $table->integer('valor');
            $table->string('descricao', 300);
            $table->bigInteger('vendido')->unsigned()->nullable();
            $table->foreign('vendido')->references('id')->on('usuario')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venda');
    }
}
