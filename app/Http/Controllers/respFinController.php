<?php

namespace App\Http\Controllers;

use App\Model\alunosGv;
use App\Model\candidato;
use App\Model\inscricao;
use App\Model\inscricaoView;
use App\Model\respFin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class respFinController extends Controller
{
    public function validaCpf(REQUEST $request){
        $this->validate(request(),
            ['cpf' => [
                function ($attribute, $value, $fail){
                    if(empty($value)) {
                        $fail('CPF INVÁLIDO');
                    }
                    $value = preg_replace("/[^0-9]/", "", $value);
                    $value = str_pad($value, 11, '0', STR_PAD_LEFT);
                    if (strlen($value) != 11) {
                        $fail('CPF INVÁLIDO');
                    }
                    else if ($value == '00000000000' ||
                        $value == '11111111111' ||
                        $value == '22222222222' ||
                        $value == '33333333333' ||
                        $value == '44444444444' ||
                        $value == '55555555555' ||
                        $value == '66666666666' ||
                        $value == '77777777777' ||
                        $value == '88888888888' ||
                        $value == '99999999999') {
                        $fail('CPF INVÁLIDO');
                    } else {
                        for ($t = 9; $t < 11; $t++) {
                            for ($d = 0, $c = 0; $c < $t; $c++) {
                                $d += $value{$c} * (($t + 1) - $c);
                            }
                            $d = ((10 * $d) % 11) % 10;
                            if ($value{$c} != $d) {
                                $fail('CPF INVÁLIDO');
                            }
                        }
                    }
                }
            ]
            ]
        );
        $value = preg_replace("/[^0-9]/", "", $request->cpf);
        if(respFin::where('CPF',$value)->first() == null || !empty(Session::get('aluno'))){
            if(!empty(Session::get('aluno'))){
                return redirect(url('/inscricao/'.$value.'/respacad'));
            }
            return redirect(url('/inscricao/'.$value.'/respfin'));
        }
        else{
            return redirect(url('/painel/'.$value));
        }

    }
    public function index($cpf){
        //dd(Session::get('aluno'));
        return view('public.respfin', compact('cpf'));
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
        $r = new respFin();
        $r->CPF = $cpf;
        $r->NOME = $request->nome;
        $r->DTNASC = $request->data;
        $r->TEL = $request->tel;
        $r->EMAIL = strtolower($request->email);
        $r->NATCID = $request->cidade;
        $r->NATEST = $request ->estado;
        $r->save();

        return redirect(url('/inscricao/'.$cpf.'/respacad'));
    }

    public function painel($cpf){
        /*$insc = candidato::where('RESPFIN_CPF',$cpf)
        ->whereIn('candidatos.id',inscricao::select('CANDIDATO_ID'))
            ->join('inscricaos','candidatos.id','inscricaos.CANDIDATO_ID')
            ->join('avaliacaos','avaliacaos.id','inscricaos.AVALIACAO_ID')
            ->get();*/
        $insc = inscricaoView::where('CPF',$cpf)
            ->groupBy('NINSC')
            ->get();
        //dd($insc);
        return view('public.painel',compact(['cpf','insc']));
    }

    public function loginIrmaos(Request $request)
    {
        $request->validate([
            'ra' => 'numeric|required'
        ],
        [
            'numeric' => 'Por favor, insira somente números.',
            'required' => 'Campo obrigatório.'
        ]);
        $ra = alunosGv::where('ra',$request->ra)
        ->where('RESPFINCPF',str_replace('.','',str_replace('-','',$request->cpf)))
        ->where('SITUACAO','ativo')
        ->first();
        //dd(str_replace('.','',str_replace('-','',$request->cpf)),$ra);
        if($ra){
            Session::put('aluno',$ra);            
            return $this->validaCpf($request);
        }
        return redirect()->back()->with('message','Aluno não encontrado');
    }
}
