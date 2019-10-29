<?php

namespace App\Http\Controllers;

use App\Model\candidato;
use App\Model\filiacao;
use App\Model\historico;
use App\Model\inscricao;
use App\Model\inscricaoView;
use App\Model\matricula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class centralController extends Controller
{    
    public function __construct()
    {
        $this->middleware('auth');         
    }
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
    public function esperaRemove($id)
    {
        inscricao::where('CANDIDATO_ID',$id)->delete();
        filiacao::where('CANDIDATO_ID',$id)->delete();
        candidato::where('id',$id)->delete();
        return redirect()->back();
    }

    public function naoPagos()
    {
        $naoPagos = inscricao::where('PAGAMENTO',0)
        ->join('candidatos','CANDIDATO_ID','candidatos.id')
        ->join('escolaridades','ESCOLARIDADE_ID','escolaridades.id')
        ->join('resp_fins','candidatos.RESPFIN_CPF','resp_fins.CPF')
        ->join('resp_acads','candidatos.RESPFIN_CPF','resp_acads.RESPFIN_CPF')
        ->where('candidatos.ESPERA',0)
        ->whereNotIn('CANDIDATO_ID',
            candidato::select('id')->where('ESPERA',1)->get()
        )
        ->select('inscricaos.id','candidatos.NOME','escolaridades.ESCOLARIDADE','escolaridades.ANO','escolaridades.TURNO',
        'resp_acads.NOME as acadNome','resp_acads.EMAIL as acadEmail','resp_acads.TEL as acadTel',
        'resp_fins.NOME as finNome','resp_fins.EMAIL as finEmail','resp_fins.TEL as finTel','resp_fins.CPF'
        )
        ->where('PAGAMENTO_DATA',null)        
        ->orderBy('escolaridades.ESCOLARIDADE')
        ->orderBy('escolaridades.ANO')
        ->orderBy('escolaridades.TURNO')
        ->orderBy('candidatos.NOME') 
        ->groupBy('inscricaos.id')               
        //->orderBy('ESCOLARIDADES.id')
        /*->whereNotIn('CANDIDATOS.respfin_cpf',
            candidato::select('respfin_cpf')
            ->join('INSCRICAOS','CANDIDATOS.id','INSCRICAOS.CANDIDATO_ID')
            ->where('INSCRICAOS.PAGAMENTO',1)
            ->get()
        )*/
        ->paginate(10);

        $total = inscricao::where('PAGAMENTO',0) 
        ->join('candidatos','CANDIDATO_ID','candidatos.id')       
        ->whereNotIn('CANDIDATO_ID',
            candidato::select('id')->where('ESPERA',1)->get()
        )
        
        ->where('PAGAMENTO_DATA',null)        
                 
        //->orderBy('ESCOLARIDADES.id')
        /*->whereNotIn('CANDIDATOS.respfin_cpf',
            candidato::select('respfin_cpf')
            ->join('INSCRICAOS','CANDIDATOS.id','INSCRICAOS.CANDIDATO_ID')
            ->where('INSCRICAOS.PAGAMENTO',1)
            ->get()
        )*/
        ->count();
        return view('admin.central_n_pg',compact('naoPagos','total'));
    }

    public function removeInsc($id)
    {
        $insc = inscricao::find($id);
        $insc->PAGAMENTO_DATA = '0000-00-00';
        $insc->save();
        return redirect()->back();
    }
    public function pagNaoMatriculado()
    {
        
        $naoMat =  inscricaoView::whereNotIn('NINSC',
            matricula::select('inscricao_id')->get()
            )
        ->where('PAGAMENTO',1)
        ->where('DTPROVA','<',date('Y-m-d'))
        ->groupBy('NINSC')
        ->orderBy('ESCOLARIDADE')
        ->orderBy('ANO')
        ->orderBy('TURNO')
        ->orderBy('CNOME')
        ->paginate(15);        
        //dd($naoMat,date('Y-m-d'));
        return view('admin.central_pg_n_mat',compact('naoMat','total'));
    }

    public function addHistorico(Request $request)
    {
        //dd($request->all());
        $historico = new historico();
        $historico->id_cand_insc = $request->id;
        $historico->observacao = $request->observacao;
        $historico->user = Auth::user()->email;
        $historico->save();
        return redirect()->back();
    }
}

