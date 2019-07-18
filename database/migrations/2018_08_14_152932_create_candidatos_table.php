<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidatos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NOME');
            $table->date('DTNASC');
            $table->string('NAT');
            $table->string('ENDERECO');
            $table->string('BAIRRO');
            $table->string('CIDADE');
            $table->string('ESTADO');
            $table->string('CEP');
            $table->string('TEL');
            $table->boolean('EXALUNO');
            $table->string('NEC_ESP')->nullable();
            $table->unsignedBigInteger('RESPFIN_CPF');
            $table->foreign('RESPFIN_CPF')->references('CPF')->on('resp_fins')->onDelete('cascade');
            $table->unsignedInteger('ESCOLARIDADE_ID');
            $table->foreign('ESCOLARIDADE_ID')->references('id')->on('escolaridades')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidatos');
    }
}
