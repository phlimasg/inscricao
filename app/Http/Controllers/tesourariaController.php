<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\avaliacao;
use App\Model\candidato;
use App\Model\escolaridade;
use App\Model\inscricao;
use App\Model\inscricaoQtdView;
use App\Model\inscricaoView;
use App\Model\respFin;
use Illuminate\Support\Facades\Auth;
use Mpdf\Mpdf;

class tesourariaController extends Controller
{
    public function __construct(){     
        $this->middleware(function ($request, $next) {
            //dd(Auth::user());
            if(Auth::check() === false){
                return redirect('/login');
            }
            if(Auth::user()->id_user_profile == 1 or Auth::user()->id_user_profile == 3){
                return $next($request);
            }
            abort(403, 'Usuário não autorizado!');
        });
    }
    public function pgIndex(){
        return view('admin.pagamento');
    }
    public function pgSearch(Request $request){
        $search = inscricaoView::where('CNOME', 'like', '%'.$request->search.'%')
            ->orWhere('NINSC', 'like', '%'.$request->search.'%')
            ->orWhere('CPF', 'like', '%'.$request->search.'%')
            ->orWhere('FINNOME', 'like', '%'.$request->search.'%')
            ->orderBy('CNOME')
            ->groupBy('NINSC')
            ->get();
        return view('admin.pagamento', compact('search'));
    }
    public function pgConfirma($insc){
        /*$id_esc = inscricaoView::select('ID_ESC')
            ->where('NINSC',$insc)
            ->first();*/
        $id_esc = inscricaoView::select('ID_ESC')
            ->join('escolaridades','inscricaoview.ID_ESC','=','escolaridades.ID')
            ->where('NINSC',$insc)
            ->whereRaw('date(CDTNASC) BETWEEN escolaridades.FX_ETARIA_INI AND escolaridades.FX_ETARIA_FIM')
            ->groupBy('NINSC')
            ->first();
        if(empty($id_esc)){
            $data = 1;
            return redirect()->route('pagamento', ['data' => $data]);
        }
        $vagas = inscricaoQtdView::selectRaw('SUM(QTD_VAGAS - QTD_INSCRITOS) AS VAGAS')
            ->where('ID',$id_esc->ID_ESC)
            ->first();

        $esc_vag = escolaridade::select('QTD_VAGAS')->where('id', $id_esc->ID_ESC)->first();   
        //dd($esc_vag,$id_esc)     ;
        if($esc_vag->QTD_VAGAS > 0){
            if($vagas->VAGAS == null || $vagas->VAGAS > 0){
                $pg = inscricao::where('id',$insc)
                    ->first();
                $pg->PAGAMENTO = 1;
                $pg->PAGAMENTO_DATA = date('Y-m-d');
                $pg->save();
                $mpdf = new Mpdf();
                $insc = inscricaoView::where('NINSC',$insc)
                    ->groupBy('NINSC')
                    ->first();
                $mpdf->WriteHTML(view('admin.pdfpagamento',compact('insc')));
                $mpdf->AddPage();
                $mpdf->WriteHTML('<div align="center">VIA DA SECRETARIA</div>');
                $mpdf->WriteHTML(view('public.pdf',compact('insc')));
                return $mpdf->Output();
            }
            else{
                $cand = inscricao::where('id',$insc)->first();
                $candidato = candidato::where('id',$cand->CANDIDATO_ID)->first();
                $candidato->espera = 1;
                $candidato->save();
                $vagas = 1;
                return redirect()->route('pagamento', ['vagas' => $vagas]);
            }        
        }
        else{
            $cand = inscricao::where('id',$insc)->first();
                $candidato = candidato::where('id',$cand->CANDIDATO_ID)->first();
                $candidato->espera = 1;
                $candidato->save();
            $vagas = 1;
            return redirect()->route('pagamento', ['vagas' => $vagas]);
        }    


    }
    public function pgCancela($insc){
        $pg = inscricao::where('id',$insc)
            ->first();
        $pg->pagamento = 0;
        $pg->save();
        return redirect('/home/pagamento');
    }
}
