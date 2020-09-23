<?php

namespace App\Http\Controllers;

use App\Mail\InscricaoConcluido;
use App\Model\avaliacao;
use App\Model\candidato;
use App\Model\escolaridade;
use App\Model\GetnetReturn;
use App\Model\inscricao;
use App\Model\inscricaoQtdView;
use App\Model\inscricaoView;
use App\Model\respFin;
use Exception;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Mpdf\Mpdf;
use Illuminate\Support\Str;

class inscricaoController extends Controller
{
    public function inscrever(Request $request)
    {

        //dd($request->all(), $respfin,$firstname,$lastname, $candidato);

        $request->validate([
            'nome' => 'required|string',
            'numero' => 'required|numeric',
            'cod' => 'required|numeric',
            'mes' => 'required|numeric|max:99',
            'ano' => 'required|numeric|max:99',
        ], [
            'string' => 'Somente texto',
            'numeric' => 'Somente números.',
            'required' => 'Campo obrigatório'
        ]);

        try {
            $respfin = respFin::where('cpf', $request->cpf)->first();
            $candidato = candidato::find($request->id_candidato);
            $firstname = Str::before($respfin->NOME, ' ');
            $lastname = Str::after($respfin->NOME, ' ');
            $rua = $candidato->ENDERECO;            
            $num = 's/n';
            $bairro = $candidato->BAIRRO;
            $cidade = $candidato->CIDADE;
            $uf = $candidato->ESTADO;
            $cep = $candidato->CEP;
            $validacao = respFin::where('CPF', $request->cpf)
                ->join('candidatos', 'candidatos.RESPFIN_CPF', '=', 'resp_fins.CPF')
                ->where('candidatos.id', $request->id_candidato)
                ->first();
            if ($validacao) {
                $i = new inscricao();
                $i->CANDIDATO_ID = $request->id_candidato;
                $i->AVALIACAO_ID = $request->avaliacao_id;
                $i->PAGAMENTO = 1;
                $i->PAGAMENTO_DATA = date('Y-m-d');
                $i->save();
                $candidato = candidato::where('id', $request->id_candidato)->first();
                $candidato->espera = 0;
                $candidato->save();
                //Mail::to($c->FINMAIL)->queue(new InscricaoConcluido($c));

                //return redirect(url('/inscricao/concluido/'.$i->CANDIDATO_ID));
            } else
                return 'erro';

            $amount = '50.00';
            $inscricao_id = 0;
            $amount = str_replace('.', '', number_format($amount, 2, '.', ''));

            $client = new \GuzzleHttp\Client();
            $response = $client->post(
                env('GETNET_URL_API_EVENTOS') . '/v1/payments/credit',
                [
                    'headers' => [
                        'Accept' => 'application/json, text/plain, */*',
                        'authorization' => 'Bearer ' . $this->TokenGenerate()->access_token,
                        'content-type' => 'application/json; charset=utf-8',
                    ],
                    'json' => [
                        'seller_id' => env('GETNET_SELLER_ID_EVENTOS'),
                        //'currency' => '',
                        'amount' => $amount,
                        'order' => [
                            'order_id' => 'Inscricao_alunos-novos-' . date('Y') . '-' . $inscricao_id,
                            //'sales_tax' => '0',
                            //'product_type' => 'service',
                        ],
                        'customer' => [
                            'customer_id' => $request->nome,
                            'first_name' => $firstname,
                            'last_name' => $lastname,
                            //'name' => $request->firstname.' '.$request->lastname,
                            'billing_address' => [
                                'street' => $rua,
                                'number' => $num,
                                //'complement'=> 'Sala 1',
                                'district' => $bairro,
                                'city' => $cidade,
                                'state' => $uf,
                                'country' => 'Brasil',
                                'postal_code' => str_replace('-', '', $cep)
                            ],
                        ],
                        'device' => [
                            'ip_address' => request()->ip(),
                        ],
                        /*'shippings'=> [                            
                            'address'=> [],
                        ],*/
                        'credit' => [
                            'delayed' => false,
                            'save_card_data' => false,
                            'transaction_type' => 'FULL',
                            'number_installments' => 1,
                            //'authenticated'=> false,
                            //'pre_authorization'=> false,
                            'soft_descriptor' => 'Inscrição de alunos novos ' . $inscricao_id,
                            //'dynamic_mcc'=> 1799,
                            'card' => [
                                'number_token' => $this->CardTokenizer($request->numero)->number_token,
                                'cardholder_name' => $request->nome,
                                'expiration_month' => $request->mes,
                                'expiration_year' => $request->ano,
                                'security_code' => $request->cod,
                                //'brand'=>'mastercard'
                            ],
                        ],
                    ]
                ]
            );
            $retorno = json_decode($response->getBody()->getContents());
            $retorno->code = $response->getStatusCode();
            //dd($retorno);

            $getnet = new GetnetReturn();
            $getnet->payment_id = $retorno->payment_id;
            $getnet->seller_id = $retorno->seller_id;
            $getnet->amount = $retorno->amount;
            $getnet->order_id = $retorno->order_id;
            $getnet->status = $retorno->status;
            $getnet->received_at = $retorno->received_at;
            $getnet->authorization_code = $retorno->credit->authorization_code;
            $getnet->authorized_at = $retorno->credit->authorized_at;
            $getnet->reason_message = $retorno->credit->reason_message;
            $getnet->acquirer = $retorno->credit->acquirer;
            $getnet->soft_descriptor = $retorno->credit->soft_descriptor;
            $getnet->acquirer_transaction_id = $retorno->credit->acquirer_transaction_id;
            $getnet->transaction_id = $retorno->credit->transaction_id;
            $getnet->code = $retorno->code;
            $getnet->inscricaos_id = $i->id;
            $getnet->save();
            //Mail::to($candidato->FINMAIL)->queue(new InscricaoConcluido($candidato));
            //dd($i);
            return redirect(url('/inscricao/concluido/'.$i->id));
            //return $this->concluido($i->id);
        } catch (RequestException  $e) {
            //$e->getRequest()
            $error = json_decode($e->getResponse()->getBody(), true);
            //dd($error);
            inscricao::destroy($i->id);
            return redirect()->back()->with('error', $error);
            //return view('errors.error', compact('e'));
        }
        catch (\Exception  $e) {
            inscricao::destroy($i->id);
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function concluido($id)
    {
        //dd($id);
        $c = inscricaoView::where('NINSC', $id)
            ->groupBy('id')
            ->first();
        //dd($c);
        return view('public.final', compact('c'));
    }
    public function TokenGenerate()
    {
        try {
            //code...
            $chave = 'Basic ' . base64_encode(env('GETNET_CLIENT_ID_EVENTOS') . ':' . env('GETNET_CLIENT_SECRET_EVENTOS'));
            $postFields = 'scope=oob&grant_type=client_credentials';
            $header = array(
                'authorization: ' . $chave,
                'content-type: application/x-www-form-urlencoded',
            );
            $ch = curl_init(env('GETNET_URL_API_EVENTOS') . '/auth/oauth/v2/token');

            curl_setopt($ch, CURLOPT_POST, 1);

            curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

            $request = json_decode(curl_exec($ch));
            curl_close($ch);

            return $request;
        } catch (\Exception $e) {
            return view('errors.error', compact('e'));
        }
    }
    public function CardTokenizer($card)
    {
        try {

            $client = new \GuzzleHttp\Client();
            $response = $client->post(
                env('GETNET_URL_API_EVENTOS') . '/v1/tokens/card',
                [
                    'headers' => [
                        'authorization' => 'Bearer ' . $this->TokenGenerate()->access_token,
                        'content-type' => 'application/json; charset=utf-8',
                    ],
                    'json' => [
                        'card_number' => $card
                    ]
                ]
            );
            $request = json_decode($response->getBody()->getContents());
            $request->code = $response->getStatusCode();
            return $request;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function CardVerification()
    {

        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->post(
                env('GETNET_URL_API_EVENTOS') . '/v1/cards/verification',
                [
                    'headers' => [
                        'authorization' => 'Bearer ' . $this->TokenGenerate()->access_token,
                        'content-type' => 'application/json; charset=utf-8',
                    ],
                    'json' => [
                        'number_token' => $this->CardTokenizer('5155901222280001')->number_token,
                        'brand' => 'mastercard',
                        'cardholder_name' => 'JOAO DA SILVA',
                        'expiration_month' => '10',
                        'expiration_year' => '18',
                        'security_code' => '123'
                    ]
                ]
            );
            $request = json_decode($response->getBody()->getContents());
            $request->code = $response->getStatusCode();
            return $request;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
