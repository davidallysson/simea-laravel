<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('sexo');
            $table->string('telefone');
            $table->string('matricula');
            $table->date('dataNascimento');
            $table->string('estadoCivil');
            $table->string('raca');
            $table->string('renda');
            $table->integer('turma_id')->unsigned();
            $table->foreign('turma_id')->references('id')->on('turmas')->onDelete('cascade');
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
        Schema::dropIfExists('pessoas');
    }
}
