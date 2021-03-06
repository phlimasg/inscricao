<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscricaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscricaos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('CANDIDATO_ID');
            $table->unsignedInteger('AVALIACAO_ID');
            $table->integer('PAGAMENTO');
            $table->date('PAGAMENTO_DATA')->nullable();
            $table->foreign('CANDIDATO_ID')->references('ID')->on('candidatos')->onDelete('cascade');
            $table->foreign('AVALIACAO_ID')->references('ID')->on('avaliacaos')->onDelete('cascade');
        });
        \Illuminate\Support\Facades\DB::statement('ALTER TABLE inscricaos AUTO_INCREMENT = 202000001;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscricaos');
    }
}
