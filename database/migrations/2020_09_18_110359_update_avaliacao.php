<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAvaliacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('avaliacaos', function (Blueprint $table) {
            $table->string('HORAPROVA');
            $table->string('VAGAS');
            $table->unsignedInteger('ESCOLARIDADE_ID');
            $table->foreign('ESCOLARIDADE_ID')->references('ID')->on('escolaridades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('avaliacaos', function (Blueprint $table) {
            //
        });
    }
}
