<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodoInscsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodo_inscs', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('abertura_irmao');
            $table->datetime('fechamento_irmao');
            $table->datetime('abertura_novos');
            $table->datetime('fechamento_novos');
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
        Schema::dropIfExists('periodo_inscs');
    }
}
