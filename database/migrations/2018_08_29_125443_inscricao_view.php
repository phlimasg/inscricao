<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
//use DB;

class inscricaoView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::statement("CREATE OR REPLACE VIEW inscricaoview AS (
SELECT candidatos.id,
	candidatos.NOME AS CNOME,
	candidatos.DTNASC AS CDTNASC,
	candidatos.NAT AS CNAT,
	candidatos.ENDERECO AS CEND,
	candidatos.BAIRRO AS CBAIRRO,
	candidatos.CIDADE AS CCIDADE,
	candidatos.ESTADO AS CESTADO,
	candidatos.CEP AS CCEP,
	candidatos.TEL AS CTEL,
	candidatos.EXALUNO AS CEXALUNO,
	candidatos.NEC_ESP AS CNEC_ESP,    
	inscricaos.id as NINSC, 
	inscricaos.PAGAMENTO,
	filiacaos.id AS ID_FIL, 
	filiacaos.NOME_1 AS FIL1NOME,
	filiacaos.DTNASC_1 AS FIL1DTNASC, 
	filiacaos.NATCID_1 AS FIL1NATCID, 
	filiacaos.NATEST_1 AS FIL1NATEST, 
	filiacaos.NOME_2 AS FIL2NOME,
	filiacaos.DTNASC_2 AS FIL2DTNASC,
	filiacaos.NATCID_2 AS FIL2NATCID,
	filiacaos.NATEST_2 AS FIL2NATEST,
	avaliacaos.id ID_AVAL, 
	avaliacaos.DTPROVA, 
	avaliacaos.DTLIMITE_INSC,
	escolaridades.id AS ID_ESC,
	escolaridades.ESCOLARIDADE, 
	escolaridades.ANO, 
	escolaridades.TURNO,
	escolaridades.QTD_VAGAS, 
	resp_acads.id AS ID_RESP, 
	resp_acads.NOME as ACADNOME,
	resp_acads.DTNASC AS ACADNASC, 
	resp_acads.TEL AS ACADTEL, 
	resp_acads.EMAIL AS ACADEMAIL, 
	resp_acads.NATCID AS ACADCID, 
	resp_acads.NATEST AS ACADEST,
    resp_fins.CPF,
    resp_fins.NOME as FINNOME,
    resp_fins.DTNASC AS FINDTNASC,
    resp_fins.TEL AS FINTEL,
    resp_fins.EMAIL AS FINMAIL,
    resp_fins.NATCID AS FINNATCID,
    resp_fins.NATEST AS FINNATEST
FROM candidatos, inscricaos, avaliacaos, escolaridades, filiacaos, resp_fins, resp_acads
	WHERE candidatos.id = inscricaos.CANDIDATO_ID
	AND inscricaos.AVALIACAO_ID = avaliacaos.id
	AND candidatos.ESCOLARIDADE_ID = escolaridades.ID
	AND candidatos.RESPFIN_CPF = resp_fins.CPF
	AND filiacaos.CANDIDATO_ID = candidatos.id
	AND resp_fins.CPF = resp_acads.RESPFIN_CPF
	GROUP BY inscricaos.id)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Illuminate\Support\Facades\DB::statement("DROP VIEW inscricaoview;");
    }
}
