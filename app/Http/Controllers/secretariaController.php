<?php

namespace App\Http\Controllers;

use App\Model\avaliacao;
use App\Model\candidato;
use App\Model\escolaridade;
use App\Model\inscricao;
use App\Model\inscricaoView;
use Mpdf\Mpdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class secretariaController extends Controller
{
    public function __construct(){     
        $this->middleware(function ($request, $next) {
            if(Auth::check() === false){
                return redirect('/login');
            }
            if(Auth::user()->id_user_profile == 1 or Auth::user()->id_user_profile == 2){
                return $next($request);
            }
            abort(403, 'Você não possui acesso.');
        });
    }
    public function secretaria(){
        
        $q = avaliacao::get();
        return view('admin.secretaria', compact('q'));
    }
    public function lstPresenca($id){        
        $e = escolaridade::select('ANO','ESCOLARIDADE')
            ->groupBy('ANO')
            ->groupBy('ESCOLARIDADE')
            ->get();
        $mpdf = new Mpdf(['orientation' => 'L']);
        foreach ($e as $esc){
            $q = inscricaoView::select('CNOME','ANO','TURNO','ESCOLARIDADE','INTEGRAL_ID')
                ->join('candidatos','inscricaoview.id','candidatos.id')
                ->where('ID_AVAL',$id)
                ->where('PAGAMENTO',1)
                ->where('ANO',$esc->ANO)
                ->where('ESCOLARIDADE',$esc->ESCOLARIDADE)
                ->groupBy('NINSC')
                //->orderBy('ID_ESC')
                ->orderBy('CNOME')
                ->get();
            if(!empty($q[0])){
                if(strcasecmp('EDUCAÇÃO INFANTIL',$esc->ESCOLARIDADE)==0){
                    $mpdf->WriteHTML(view('admin.pdf.presCabecalhoEI',compact('esc')));
                    $mpdf->WriteHTML(view('admin.pdf.presTableEI',compact('q')));
                    $mpdf->AddPage();
                }
                else{
                    $mpdf->WriteHTML(view('admin.pdf.presCabecalho',compact('esc')));
                    $mpdf->WriteHTML(view('admin.pdf.presTable',compact('q')));
                    $mpdf->AddPage();
                }
            }
        }
        return $mpdf->Output();
    }

    public function etiqueta_old($id){
        $html = '<style>body{font-family: Tahoma;text-transform: uppercase;}table {border-collapse: collapse;}
        tr {
            border-collapse: collapse;
            border: 1px solid white;
        }
        </style>
            <table width="100%">';
        $fim = '</table>';

        $q = inscricaoView::where('ID_AVAL',$id)
            ->where('PAGAMENTO',1)
            ->orderby('CNOME')
            ->groupBy('NINSC')
            ->limit(5)
            ->get();

        $mpdf = new Mpdf(['orientation' => 'L']);

        //$mpdf->WriteHTML($cabecalho);
        $count = 0;

        foreach ($q as $a){
            if($count == 0) {
                //$mpdf->WriteHTML('<tr>');
                $html.='<tr>';
            }
            $count++;
            //$mpdf->WriteHTML(view('admin.pdf.etiqueta', compact('a')));
            $html.= view('admin.pdf.etiqueta', compact('a'));
            if($count == 3){
                $count = 0;
                //$mpdf->WriteHTML('</tr>');
                $html.='</tr>';
            }
        }
        $html .= $fim;
        echo $html;
        return;
        $mpdf->WriteHTML($fim);
        //$mpdf->WriteHTML(view('admin.pdf.etiqueta',compact('q')));
        return $mpdf->Output();
    }
    public function alterarDataIndex(){
        return view('admin.secretaria_prova');
    }
    public function alterarDataProcurar(Request $request){
        $request->busca;
        $busca = candidato::where('NOME','like','%'.$request->busca.'%')
            //->whereIn('candidatos.id',inscricao::get(['CANDIDATO_ID']))
            ->join('inscricaos','candidatos.id','inscricaos.CANDIDATO_ID')
            ->join('avaliacaos','inscricaos.AVALIACAO_ID','avaliacaos.id')
            ->limit(20)
            ->groupBy('candidatos.id')
            ->get(['candidatos.NOME','avaliacaos.DTPROVA','inscricaos.id','inscricaos.PAGAMENTO']);
        $dt = avaliacao::where('DTPROVA','>',date('Y-m-d'))->get();
        return view('admin.secretaria_prova',compact(['busca','dt']));
    }
    public function alterarDataSave(Request $request){
        if(inscricao::where('id',$request->id_insc)->update(['AVALIACAO_ID' => $request->id_aval])){
            return redirect()->back()->withErrors('1');
        }
        else
            return redirect()->back()->withErrors('0');
    }

    public function etiquetaKit($id){
        $cabecalho = '<style>body{font-family: Tahoma;text-transform: uppercase;}table {border-collapse: collapse;}
        tr {
            border-collapse: collapse;
            border: 1px solid black;
        }
        </style>
            <table width="100%">';
        $fim = '</table>';

        $q = inscricaoView::where('ID_AVAL',$id)
            ->where('PAGAMENTO',1)
            ->orderby('ESCOLARIDADE')
            ->orderby('ANO')
            ->orderby('TURNO')
            ->orderby('CNOME')
            ->groupBy('NINSC')            
            ->get();
        $mpdf = new Mpdf(['orientation' => 'L']);

        $mpdf->WriteHTML($cabecalho);
        $count = 0;

        foreach ($q as $a){
            if($count == 0) {
                $mpdf->WriteHTML('<tr style="border-right: 1px solid black;">');
            }
            $count++;
            $mpdf->WriteHTML(view('admin.pdf.etiquetaKit', compact('a')));
            if($count == 3){
                $count = 0;
                $mpdf->WriteHTML('</tr>');
            }
        }
        $mpdf->WriteHTML($fim);
        //$mpdf->WriteHTML(view('admin.pdf.etiqueta',compact('q')));
        return $mpdf->Output();
    }

    public function etiqueta($id){
        $html = '<style>body{font-family: Tahoma;text-transform: uppercase; font-size: 45px}table {border-collapse: collapse;}
        tr {
            border-collapse: collapse;
            border: 1px solid white;
        }
        </style>
            <table width="100%">';
        $fim = '</table>';

        $q = inscricaoView::where('ID_AVAL',$id)
            ->where('PAGAMENTO',1)
            ->orderby('CNOME')
            ->groupBy('NINSC')
            //->limit(5)
            ->get();

        $mpdf = new Mpdf(['orientation' => 'L']);

        //$mpdf->WriteHTML($cabecalho);
        $count = 0;

        foreach ($q as $a){
            if($count == 0) {
                //$mpdf->WriteHTML('<tr>');
                $html.='<tr>';
            }
            $count++;
            //$mpdf->WriteHTML(view('admin.pdf.etiqueta', compact('a')));
            $html.= view('admin.pdf.etiqueta', compact('a'));
            if($count == 3){
                $count = 0;
                //$mpdf->WriteHTML('</tr>');
                $html.='</tr>';
            }
        }
        $html .= $fim;
        //echo $html;
        //return;
        $mpdf->WriteHTML($html);
        //$mpdf->WriteHTML(view('admin.pdf.etiqueta',compact('q')));
        return $mpdf->Output();
    }
    public function etiquetaPulseira($id){
        $html = '<style>body{font-family: Tahoma;text-transform: uppercase; }table {border-collapse: collapse;}
        tr {
            border-collapse: collapse;
            border: 1px solid white;
        }
        </style>
            <table width="100%">';
        $fim = '</table>';

        $q = inscricaoView::where('ID_AVAL',$id)
            ->where('PAGAMENTO',1)
            ->orderby('CNOME')
            ->groupBy('NINSC')
            //->limit(5)
            ->get();

        $mpdf = new Mpdf();

        //$mpdf->WriteHTML($cabecalho);
        $count = 0;

        foreach ($q as $a){
            if($count == 0) {                
                $html.='<tr>';
            }
            $count++;            
            $html.= view('admin.pdf.etiquetaPulseira', compact('a'));
            if($count == 5){
                $count = 0;                
                $html.='</tr>';
            }
        }
        $html .= $fim;
        $mpdf->WriteHTML($html);
        return $mpdf->Output();
    }
}
