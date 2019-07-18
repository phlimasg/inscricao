<?php

namespace App\Http\Controllers;

use App\Model\avaliacao;
use App\Model\escolaridade;
use App\Model\inscricao;
use App\Model\inscricaoQtdView;
use App\Model\inscricaoView;
use App\Model\respFin;
use Illuminate\Http\Request;
use Mpdf\Mpdf;

class inscricaoController extends Controller
{
    public function inscrever(Request $request){
        $validacao = respFin::where('CPF',$request->cpf)
        ->join('candidatos','candidatos.RESPFIN_CPF','=','resp_fins.CPF')
            ->where('candidatos.id',$request->id_candidato)
            ->first();
        if($validacao){
            $i = new inscricao();
            $i->CANDIDATO_ID = $request->id_candidato;
            $i->AVALIACAO_ID = $request->avaliacao_id;
            $i->PAGAMENTO = 0;
            $i->PAGAMENTO_DATA = null;
            $i->save();
            return redirect(url('/inscricao/concluido/'.$i->CANDIDATO_ID));
        }
        else
            return 'erro';
    }
    public function concluido($id){
        $c = inscricaoView::where('id',$id)
            ->groupBy('id')
            ->first();
//        /dd($c);
        return view('public.final', compact('c'));
    }
    
}
