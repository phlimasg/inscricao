<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespFinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resp_fins', function (Blueprint $table) {
            $table->bigIncrements('CPF');
            $table->string('NOME');
            $table->date('DTNASC');
            $table->string('TEL');
            $table->string('EMAIL');
            $table->string('NATCID');
            $table->string('NATEST');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resp_fins');
    }
}
