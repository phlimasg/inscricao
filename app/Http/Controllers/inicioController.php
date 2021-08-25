<?php

namespace App\Http\Controllers;

use App\Model\periodoInsc;
use Illuminate\Http\Request;

class inicioController extends Controller
{
    public function index()
    {
        $irmao = periodoInsc::where('abertura_irmao','<=',date('Y-m-d H:i:s'))
        ->where('fechamento_irmao','>=',date('Y-m-d H:i:s'))
        ->first();
        if($irmao)
            return view('public.login_irmaos');
        else{
            $novas = periodoInsc::where('abertura_novos','<=',date('Y-m-d H:i:s'))
            ->where('fechamento_novos','>=',date('Y-m-d H:i:s'))
            ->first();
            if($novas)
                return view('public.login');
            else
                return abort(403,'Período encerrado.');
        }
    }
}
