<?php

namespace App\Http\Controllers;

use App\Mail\InscricaoConcluido;
use App\Model\avaliacao;
use App\Model\candidato;
use App\Model\escolaridade;
use App\Model\inscricao;
use App\Model\inscricaoQtdView;
use App\Model\inscricaoView;
use App\Model\respFin;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Mpdf\Mpdf;

class inscricaoController extends Controller
{
    public function inscrever(Request $request){
        try {            
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
                $candidato = candidato::where('id',$request->id_candidato)->first();
                $candidato->espera = 0;
                $candidato->save();
                $c = inscricaoView::where('id',$i->CANDIDATO_ID)
                ->groupBy('id')
                ->first();
                //dd($c);
                Mail::to($c->FINMAIL)
                ->queue(new InscricaoConcluido($c));
                
                return redirect(url('/inscricao/concluido/'.$i->CANDIDATO_ID));
            }
            else
                return 'erro';
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function concluido($id){
        
        $c = inscricaoView::where('id',$id)
        ->groupBy('id')
        ->first();
        //dd($c);
        return view('public.final', compact('c'));
    }
    
}
