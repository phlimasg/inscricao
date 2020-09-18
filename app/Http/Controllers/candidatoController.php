<?php

namespace App\Http\Controllers;

use App\Model\avaliacao;
use App\Model\candidato;
use App\Model\documentos;
use App\Model\escolaridade;
use App\Model\filiacao;
use App\Model\inscricao;
use App\Model\inscricaoQtdView;
use App\Model\inscricaoView;
use App\Model\integral;
use App\Model\integral_insc;
use Illuminate\Http\Request;
use Mpdf\Mpdf;
use Illuminate\Support\Str;

class candidatoController extends Controller
{
    public function index($cpf)
    {
        $escolaridade = escolaridade::select('escolaridade')
            ->groupBy('escolaridade')
            ->get();
        return view('public.candidato', compact('cpf', 'escolaridade'));
    }
    public function selectAno($esc)
    {
        return escolaridade::select('ANO')
            ->where('escolaridade', $esc)
            ->groupBy('ANO')
            ->get();
    }
    public function selectTurno($esc, $ano)
    {
        return escolaridade::select('ID', 'TURNO', 'FX_ETARIA_INI', 'FX_ETARIA_FIM')
            ->where('escolaridade', $esc)
            ->where('ano', $ano)
            ->groupBy('TURNO')
            ->get();
    }
    public function selectFxEtaria($id)
    {
        return escolaridade::select('FX_ETARIA_INI', 'FX_ETARIA_FIM')
            ->where('id', $id)
            ->get();
    }
    public function save(Request $request, $cpf)
    {
        $request->validate([
            'nome' => 'string|required|max:254',
            'data' => 'required|date|after_or_equal:1910-01-01',
            'nat_cidade'=> 'string|required|max:254',
            'rua'=> 'string|required|max:254',
            'bairro'=> 'string|required|max:254',
            'cidade'=> 'string|required|max:254',
            'estado'=> 'string|required|max:254',
            'cep'=> 'string|required|max:254',
            'tel' => 'required',            
            'cidade' => 'string|required|max:25',
            'estado' => 'required',
            'turno'=> 'required',
            'nomef1'=> 'string|required|max:254',
            'nomef2'=> 'string|required|max:254',
            'dataf1'=> 'required|date|after_or_equal:1910-01-01',
            'dataf2'=> 'required|date|after_or_equal:1910-01-01',
            'cidadef1'=> 'string|required|max:254',
            'cidadef2'=> 'string|required|max:254',
            'estadof1'=> 'string|required|max:254',
            'estadof2'=> 'string|required|max:254',
            'documento.*' => 'required|file|mimes:jpeg,jpg,pdf,PDF|max:20000',
            'documento_opcional.*' => 'file|mimes:jpeg,jpg,pdf,PDF|max:20000',//20MB
        ],
        [
            'required' => 'Campo Obrigatório',
            'required_if' => 'Campo Obrigatório',
            'digits_between' => 'Min. de :min e max. :max digitos',
            'min' => 'Mínimo de :min de caracteres',
            'max' => 'Limite de :max caracteres',
            'numeric' => 'Somente números',
            'mimes' => 'O documento deve ser formato:jpeg,jpg,pdf',
        ]);
        //dd($request->documento);
        $c = new candidato();
        $c->NOME = $request->nome;
        $c->DTNASC = $request->data;
        $c->NAT = $request->nat_cidade . ' - ' . $request->nat_estado;
        $c->ENDERECO = $request->rua;
        $c->BAIRRO = $request->bairro;
        $c->CIDADE = $request->cidade;
        $c->ESTADO = $request->estado;
        $c->CEP = $request->cep;
        $c->TEL = $request->tel;
        if (strcasecmp($request->exAluno, 's') == 0)
            $c->EXALUNO = true;
        else
            $c->EXALUNO = false;
        $c->NEC_ESP = $request->nEsp;
        $c->ESCOLARIDADE_ID = $request->turno;
        if ($request->integral == "1") {
            $id = escolaridade::find($request->turno)->integral;
            if (!empty($id->id))
                $c->INTEGRAL_ID = $id->id;
        }
        $c->RESPFIN_CPF = $cpf;
        //dd($request->all());
        $c->save();
        $this->fileUpload($request->documento, $c->id);
        $request->documento_opcional ? $this->fileUpload($request->documento_opcional, $c->id):'';
        $f = new filiacao();
        $f->CANDIDATO_ID = $c->id;
        $f->NOME_1 = $request->nomef1;
        $f->NOME_2 = $request->nomef2;
        $f->DTNASC_1 = $request->dataf1;
        $f->NATCID_1 = $request->cidadef1;
        $f->NATEST_1 = $request->estadof1;
        $f->DTNASC_2 = $request->dataf2;
        $f->NATCID_2 = $request->cidadef2;
        $f->NATEST_2 = $request->estadof2;
        $f->save();
        return redirect('/inscricao/candidato/prova/' . $cpf . '/' . $c->id);
    }
    public function diaProva($cpf, $id_candidato)
    {
        $esc_id = candidato::select('ESCOLARIDADE_ID', 'INTEGRAL_ID')->where('id', $id_candidato)->first();
        $esc_vag = escolaridade::select('QTD_VAGAS')->where('id', $esc_id->ESCOLARIDADE_ID)->first();
        $qtd = inscricaoQtdView::selectRaw('(QTD_VAGAS-QTD_INSCRITOS) AS VAGAS')
            ->where('ID', $esc_id->ESCOLARIDADE_ID)
            ->first();
        //dd($esc_id,$esc_vag,$qtd);
        if ($esc_id->INTEGRAL_ID == null) {
            if ($esc_vag->QTD_VAGAS > 0) {
                if ($qtd == null or $qtd->VAGAS > 0) {
                    $a = avaliacao::where('DTLIMITE_INSC', '>=', date('Y-m-d'))
                        ->where('ESCOLARIDADE_ID',$esc_id->ESCOLARIDADE_ID)
                        ->orderBy('DTLIMITE_INSC')
                        //->limit(1)
                        ->get();
                      //  ->first();
                    //dd($a->qtdInscritos()->count());
                    return view('public.data', compact(['a', 'cpf', 'id_candidato']));
                } else {
                    $candidato = candidato::where('id', $id_candidato)->first();
                    $candidato->espera = 1;
                    $candidato->save();
                    return view('public.esgotado', compact(['a', 'cpf', 'id_candidato']));
                }
            } else {
                $candidato = candidato::where('id', $id_candidato)->first();
                $candidato->espera = 1;
                $candidato->save();
                return view('public.esgotado', compact(['a', 'cpf', 'id_candidato']));
            }
        } else {
            $vagas_integral = integral::where('id', $esc_id->INTEGRAL_ID)->first();
            if ($esc_vag->QTD_VAGAS > 0) {
                if ($qtd == null or $qtd->VAGAS > 0) {
                    $a = avaliacao::where('DTLIMITE_INSC', '>', date('Y-m-d'))
                        ->orderBy('DTLIMITE_INSC')
                        ->limit(1)
                        ->get();

                    if ($vagas_integral->vagas > 0) {
                        //dd($candidato);
                        $integral_insc = integral_insc::where('id', $esc_id->INTEGRAL_ID)->first();
                        if ($integral_insc != null) {
                            if (($vagas_integral->vagas - $integral_insc->qtd_inscritos) <= 0) {
                                $candidato = candidato::where('id', $id_candidato)->first();
                                $candidato->INTEGRAL_ESPERA = 1;
                                $candidato->save();
                                $integral_espera = 1;
                                //dd($candidato);
                                return view('public.data', compact(['a', 'cpf', 'id_candidato', 'integral_espera']));
                            }
                        }
                    } else {
                        $candidato = candidato::where('id', $id_candidato)->first();
                        $candidato->INTEGRAL_ESPERA = 1;
                        $candidato->save();
                        $integral_espera = 1;
                        //dd($candidato);
                        return view('public.data', compact(['a', 'cpf', 'id_candidato', 'integral_espera']));
                    }
                    return view('public.data', compact(['a', 'cpf', 'id_candidato']));
                } else {
                    $candidato = candidato::where('id', $id_candidato)->first();
                    $candidato->espera = 1;
                    $candidato->INTEGRAL_ESPERA = 1;
                    $candidato->save();
                    return view('public.esgotado', compact(['a', 'cpf', 'id_candidato']));
                }
            } else {
                $candidato = candidato::where('id', $id_candidato)->first();
                $candidato->espera = 1;
                $candidato->INTEGRAL_ESPERA = 1;
                $candidato->save();
                return view('public.esgotado', compact(['a', 'cpf', 'id_candidato']));
            }
        }
    }

    public function gerarPdf($cpf, $insc)
    {
        $mpdf = new Mpdf();
        $insc = inscricaoView::where('CPF', $cpf)
            ->where('NINSC', $insc)
            ->groupBy('NINSC')
            ->first();            
        $candidato_espera = inscricao::where('inscricaos.ID', $insc->NINSC)
            ->join('candidatos', 'CANDIDATO_ID', 'candidatos.ID')
            ->select('INTEGRAL_ESPERA','INTEGRAL_ID')
            ->first();
            //dd($candidato_espera);
        //$integral = integral::where('esc_id', $insc->ID_ESC)->first();
        //dd($integral,$candidato_espera);
        $mpdf->WriteHTML(view('public.pdf', compact('insc', 'integral','candidato_espera')));
        return $mpdf->Output();
    }
    public function fileUpload($upload,$id)
    {
        //dd($upload);
        
        $count=1;
        foreach ($upload as $i){
            $doc = new documentos();
            $namefile = rand(0,9999).'_'.date('d-m-Y_H-m-s').'_'.Str::kebab($i->getClientOriginalName());
            $up = $i->storeAs('/'.'/public/upload/documentos/'.$id,$namefile);
            //dd(storage_path(),$up);
            //chmod(storage_path('/app/public/upload/documentos/'),0777);
            //chmod(storage_path('/app/public/upload/documentos/'.$id),0777);
            //chmod(storage_path('app/public/'.$up),0777);
            $doc->nome = $namefile;
            $doc->url = $up;
            $doc->candidato_id = $id;
            $doc->save();
            //dd($up,$namefile,$doc);
            if (!$up )
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao fazer upload')
                    ->withInput();
            $count++;
        }
    }
}
