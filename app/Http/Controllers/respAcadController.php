<?php

namespace App\Http\Controllers;

use App\Model\respAcad;
use Illuminate\Http\Request;

class respAcadController extends Controller
{
    public function index($cpf){
        return view('public.respacad', compact('cpf'));
    }
    public function save(REQUEST $request, $cpf){
        $request->validate([
            'nome' => 'string|required|max:254',
            'data' => 'required|date|after_or_equal:1910-01-01',
            'tel' => 'required',
            'email' => 'string|required|max:254',
            'cidade' => 'string|required|max:25',
            'estado' => 'required',
        ]);
        $r = new respAcad();
        $r->RESPFIN_CPF = $cpf;
        $r->NOME = $request->nome;
        $r->DTNASC = $request->data;
        $r->TEL = $request->tel;
        $r->EMAIL = $request->email;
        $r->NATCID = $request->cidade;
        $r->NATEST = $request ->estado;
        $r->save();
        return redirect(url('/inscricao/'.$cpf.'/candidato'));
    }
}
