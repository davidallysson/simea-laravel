<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->boolean('disponivel');
            $table->integer('eixo_id')->unsigned();
            $table->foreign('eixo_id')->references('id')->on('eixos')->onDelete('cascade');
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
        Schema::dropIfExists('questionarios');
    }
}
