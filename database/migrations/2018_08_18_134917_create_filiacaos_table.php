<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFiliacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filiacaos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NOME_1');
            $table->date('DTNASC_1');
            $table->string('NATCID_1');
            $table->string('NATEST_1');
            $table->string('NOME_2');
            $table->date('DTNASC_2');
            $table->string('NATCID_2');
            $table->string('NATEST_2');
            $table->unsignedInteger('CANDIDATO_ID');
            $table->foreign('CANDIDATO_ID')->references('ID')->on('candidatos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filiacaos');
    }
}
