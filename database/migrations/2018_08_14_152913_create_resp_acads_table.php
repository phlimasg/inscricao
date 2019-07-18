<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespAcadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resp_acads', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('NOME');
            $table->date('DTNASC');
            $table->string('TEL');
            $table->string('EMAIL');
            $table->string('NATCID');
            $table->string('NATEST');
            $table->unsignedBigInteger('RESPFIN_CPF');
            $table->foreign('RESPFIN_CPF')->references('CPF')->on('resp_fins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resp_acads');
    }
}
