<?php

namespace App\Http\Controllers;

use App\Model\avaliacao;
use Illuminate\Http\Request;

class avaliacaoController extends Controller
{
    public function index(){
        $a = avaliacao::all();
        return view('admin.avaliacao', compact('a'));
    }
    public function save(Request $r){
        $a = new avaliacao();
        $a->DTLIMITE_INSC = $r->dtlimite_insc;
        $a->DTPROVA = $r->dtprova;
        $a->save();
        return redirect()->route('avIndex');
    }
    public function destroy($id){
        avaliacao::destroy($id);
        return redirect()->route('avIndex');
    }
}
