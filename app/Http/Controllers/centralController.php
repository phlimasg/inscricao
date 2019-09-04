<?php

namespace App\Http\Controllers;

use App\Model\candidato;
use App\Model\inscricao;
use Illuminate\Http\Request;

class centralController extends Controller
{    
    public function index(){
        return redirect('/home/procurar');
    }

    public function search(Request $request){
        $r = inscricaoView::where('CNOME','like','%'.$request->name.'%')
            ->orWhere('ACADNOME','like','%'.$request->name.'%')
            ->orWhere('FINNOME','like','%'.$request->name.'%')
            ->orWhere('CPF','like','%'.$request->name.'%')
            ->orWhere('NINSC','like','%'.$request->name.'%')
            ->limit(50)
            ->orderBy('CNOME')
            ->groupBy('NINSC')
            ->get();
        return view('admin.search', compact('r'));
    }
    public function espera()
    {
        $lista = candidato::where('candidatos.ESPERA',1)
        ->select('candidatos.id','candidatos.NOME','escolaridades.ESCOLARIDADE','escolaridades.ANO','escolaridades.TURNO',
        'resp_acads.NOME as acadNome','resp_acads.EMAIL as acadEmail','resp_acads.TEL as acadTel',
        'resp_fins.NOME as finNome','resp_fins.EMAIL as finEmail','resp_fins.TEL as finTel','resp_fins.CPF')
        ->join('escolaridades','candidatos.ESCOLARIDADE_ID','escolaridades.id')
        ->join('resp_fins','candidatos.RESPFIN_CPF','resp_fins.CPF')
        ->join('resp_acads','candidatos.RESPFIN_CPF','resp_acads.RESPFIN_CPF')
        ->groupBy('candidatos.id')
        ->orderBy('escolaridades.ESCOLARIDADE')
        ->orderBy('escolaridades.ANO')
        ->orderBy('escolaridades.TURNO')
        ->orderBy('candidatos.id')
        ->get();
        
        $lista_insc = candidato::join('inscricaos','candidatos.id','inscricaos.CANDIDATO_ID')
        ->join('escolaridades','candidatos.ESCOLARIDADE_ID','escolaridades.id')
        ->whereIn('RESPFIN_CPF',candidato::select('candidatos.RESPFIN_CPF')->where('candidatos.ESPERA',1)->get())
        ->where('PAGAMENTO',1)
        ->get();
        //dd($lista_insc);
        return view('admin.central_espera',compact('lista','lista_insc'));
    }
}

