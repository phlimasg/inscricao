<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QtdInscView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::statement('CREATE OR REPLACE VIEW qtd_insc AS(
    SELECT escolaridades.ID, 
    escolaridades.ANO, 
    escolaridades.TURNO, 
    escolaridades.QTD_VAGAS,
    COUNT(*) AS QTD_INSCRITOS
FROM `inscricaos`, candidatos, escolaridades 
    WHERE inscricaos.CANDIDATO_ID = candidatos.id
    AND candidatos.ESCOLARIDADE_ID = escolaridades.ID
    AND inscricaos.PAGAMENTO = 1
    GROUP BY escolaridades.ID)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
