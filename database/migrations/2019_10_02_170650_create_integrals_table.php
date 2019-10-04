<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateIntegralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::create('integrals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('turno');
            $table->string('vagas');
            $table->unsignedInteger('esc_id');
            $table->foreign('esc_id')->references('id')->on('escolaridades')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::table('candidatos', function (Blueprint $table) {
            $table->integer('INTEGRAL_ESPERA')->nullable();
            $table->unsignedInteger('INTEGRAL_ID')->nullable();
            $table->foreign('INTEGRAL_ID')->references('id')->on('integrals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('candidatos', function (Blueprint $table) {
            $table->dropIfExists('INTEGRAL_ID');
            $table->dropIfExists('INTEGRAL_ESPERA');
            
        });
        Schema::dropIfExists('integrals');
    }
}
