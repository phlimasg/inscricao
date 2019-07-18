<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscolaridadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escolaridades', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('ESCOLARIDADE');
            $table->string('ANO');
            $table->string('TURNO');
            $table->date('FX_ETARIA_INI');
            $table->date('FX_ETARIA_FIM');
            $table->integer('QTD_VAGAS');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('escolaridades');
    }
}
