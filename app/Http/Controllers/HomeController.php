<?php

namespace App\Http\Controllers;

use App\Model\avaliacao;
use App\Model\inscricao;
use App\Model\inscricaoQtdDataView;
use App\Model\inscricaoQtdView;
use App\Model\inscricaoView;
use Illuminate\Http\Request;
use App\Model\matricula;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pg = new inscricaoQtdView();
        $qtdPg = inscricao::where('PAGAMENTO','1')
            ->count();
        $pg = $pg::orderBy('ID')->get();
        //dd($pg);
        //$insc = inscricaoView::where('PAGAMENTO_DATA','!=','0000-00-00')->groupBy('id');
        $inscCount = inscricao::whereNotIn('id',inscricao::select('id')->where('PAGAMENTO_DATA','=','0000-00-00')->get())
        ->whereNotIn('id',inscricao::select('id')->where('PAGAMENTO',0)->where('PAGAMENTO_DATA','!=',null)->get()
                )
        //->groupBy('id')
        ->count();
        //dd($inscCount);
        $dtprova = avaliacao::get();
        /*$countDt = inscricaoView::selectRaw('DTPROVA,ESCOLARIDADE,count(*) as QTD')
            ->groupBy('DTPROVA')
            ->groupBy('ESCOLARIDADE')
            ->get();*/
        $countDt = inscricaoQtdDataView::get();

        $countMat = matricula::count();        

        return view('admin.relatorio', compact(['qtdPg','pg','insc','inscCount','countDt','dtprova', 'countMat']));
    }
    public function searchIndex(){
        return view('admin.search');
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
}
