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
        $lista = candidato::whereNotIn('candidatos.id',
            inscricao::select('CANDIDATO_ID')->get()
        )
        ->select('candidatos.id','candidatos.NOME','escolaridades.ESCOLARIDADE','escolaridades.ANO','escolaridades.TURNO')
        ->join('escolaridades','candidatos.ESCOLARIDADE_ID','escolaridades.id')
        ->orderBy('escolaridades.ESCOLARIDADE')
        ->orderBy('escolaridades.ANO')
        ->orderBy('escolaridades.TURNO')
        ->orderBy('candidatos.id')
        ->get();
        return view('admin.central_espera',compact('lista'));
    }
}

