<?php

namespace App\Http\Controllers;

use App\Model\avaliacao;
use App\Model\candidato;
use App\Model\escolaridade;
use App\Model\filiacao;
use App\Model\inscricao;
use App\Model\inscricaoQtdView;
use App\Model\inscricaoView;
use Illuminate\Http\Request;
use Mpdf\Mpdf;

class candidatoController extends Controller
{
    public function index($cpf){
        $escolaridade = escolaridade::select('escolaridade')
            ->groupBy('escolaridade')
            ->get();
        return view('public.candidato', compact('cpf','escolaridade'));
    }
    public function selectAno($esc){
        return escolaridade::select('ANO')
            ->where('escolaridade',$esc)
            ->groupBy('ANO')
            ->get();
    }
    public function selectTurno($esc,$ano){
        return escolaridade::select('ID','TURNO','FX_ETARIA_INI','FX_ETARIA_FIM')
            ->where('escolaridade',$esc)
            ->where('ano',$ano)
            ->groupBy('TURNO')
            ->get();
    }
    public function selectFxEtaria($id){
        return escolaridade::select('FX_ETARIA_INI','FX_ETARIA_FIM')
            ->where('id',$id)
            ->get();
    }
    public function save(Request $request, $cpf){
        $c = new candidato();
        $c->NOME = $request->nome;
        $c->DTNASC = $request->data;
        $c->NAT = $request->nat_cidade.' - '.$request->nat_estado;
        $c->ENDERECO = $request->rua;
        $c->BAIRRO = $request->bairro;
        $c->CIDADE = $request->cidade;
        $c->ESTADO = $request->estado;
        $c->CEP = $request->cep;
        $c->TEL = $request->tel;
        if(strcasecmp($request->exAluno , 's')==0)
            $c->EXALUNO = true;
        else
            $c->EXALUNO = false;
        $c->NEC_ESP = $request->nEsp;
        $c->ESCOLARIDADE_ID = $request->turno;
        $c->RESPFIN_CPF = $cpf;
        $c->save();

        $f = new filiacao();
        $f->CANDIDATO_ID = $c->id;
        $f->NOME_1 = $request->nomef1;
        $f->NOME_2 = $request->nomef2;
        $f->DTNASC_1 = $request->dataf1;
        $f->NATCID_1 = $request->cidadef1;
        $f->NATEST_1 = $request->estadof1;
        $f->DTNASC_2 = $request->dataf2;
        $f->NATCID_2 = $request->cidadef2;
        $f->NATEST_2 = $request->estadof2;
        $f->save();
        return redirect('/inscricao/candidato/prova/'.$cpf.'/'.$c->id);
    }
    public function diaProva($cpf, $id_candidato){
        $esc_id = candidato::select('ESCOLARIDADE_ID')->where('id',$id_candidato)->first();
        $esc_vag = escolaridade::select('QTD_VAGAS')->where('id', $esc_id->ESCOLARIDADE_ID)->first();        
        $qtd = inscricaoQtdView::selectRaw('(QTD_VAGAS-QTD_INSCRITOS) AS VAGAS')
            ->where('ID',$esc_id->ESCOLARIDADE_ID)
            ->first();
        //dd($qtd, $esc_id);
        if($esc_vag->QTD_VAGAS > 0){
            if($qtd == null or $qtd->VAGAS > 0){
                $a = avaliacao::where('DTLIMITE_INSC','>',date('Y-m-d'))
                    ->orderBy('DTLIMITE_INSC')
                    ->limit(1)
                    ->get();
                // dd($a);
                return view('public.data', compact(['a','cpf','id_candidato']));
            }
            else{
                $candidato = candidato::where('id',$id_candidato)->first();
                $candidato->espera = 1;
                $candidato->save();
                return view('public.esgotado', compact(['a','cpf','id_candidato']));
            }
        }
        else{
            $candidato = candidato::where('id',$id_candidato)->first();
                $candidato->espera = 1;
                $candidato->save();
                return view('public.esgotado', compact(['a','cpf','id_candidato']));
        }
            

    }

    public function gerarPdf($cpf,$insc){
        $mpdf = new Mpdf();
        $insc = inscricaoView::where('CPF',$cpf)
            ->where('NINSC',$insc)
            ->groupBy('NINSC')
            ->first();
        //dd($insc);
        $mpdf->WriteHTML(view('public.pdf',compact('insc')));
        return $mpdf->Output();
    }
}
