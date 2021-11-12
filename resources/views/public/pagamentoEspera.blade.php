@extends('layouts.layout')
@section('content')
    <div class="container-fluid title">
        <h1>Reunião com a Coordenação</h1>
    </div>
    <form action="{{route('inscrever')}}" method="post" id="form">
        <input type="text" value="{{$candidato->RESPFIN_CPF}}" hidden name="cpf">
        <input type="text" value="{{$candidato->id}}" hidden name="id_candidato">
        <div class="container-fluid form">
            <div class="container ">
                   @csrf
                   @if (!empty($integral_espera) && $integral_espera == 1)
                   <div class="alert alert-danger">
                      <strong>Aviso!</strong> <br>
                      por falta de vagas para o turno complementar, o candidato foi inserido automaticamente na lista de espera.<br>
                      A inscrição para o turno regular poderá ser executada normalmente.
                    </div>
                   @endif
                   <div class="row">
                       <div class="col-sm-12">
                           Olá {{$candidato->respFin->NOME}}, Finalize a inscrição de {{$candidato->NOME}}. 
                           <div class="alert alert-danger">                               
                                Esse link irá expirar em: <span class="text-danger">{{date('d/m/Y H:i:s', strtotime('+48 hours', strtotime($candidato->liberacao_data)))}}</span>.
                               
                           </div>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-sm-4">
                           <label for="">Escolha o dia:</label>
                           <select name="avaliacao_id" id="" class="form-control" required>
                               <option value=""></option>
                               @foreach($a as $dia)
                               
                                    <option value="{{$dia->id}}">{{date('d/m/Y', strtotime($dia->DTPROVA))}} AS {{$dia->HORAPROVA}} </option> 
                                    @php
                                        break;
                                    @endphp                              
                                
                               @endforeach
                           </select>
                       </div>
                   </div>
<h3>                   <i class="fa fa-credit-card"></i> Dados para pagamentos com cartão de crédito: </h3>                   
                        <div class="row">
                          <div class="col-sm-12">
                            <h2 class=""><b>Valor: R$ 60,00</b></h2>  
                          </div>
                          @if(session('error'))
                          <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-danger">
                                    <b>ERRO NO PAGAMENTO, TENTE NOVAMENTE</b>
                                    {{!empty(session('error')['status_code'])}} - {{!empty(session('error')['details'][0]['description_detail'])}}
                                </div>
                            </div>      
                        </div>  
                        @endif
                        </div>   
                              <div class="row">
                                  <div class="col-sm-6">
                                      <label for="">Nome do titular do cartão:</label>
                                  <input type="text" name="nome" id="" class="form-control" value="{{old('nome')}}" required>
                                  
                                  </div>            
                              </div>        
                              
                          <div class="row">
                              <div class="col-sm-6">
                                  <label for="">Número do cartão:</label>
                                  <input type="text" name="numero" id="" class="form-control" value="{{old('numero')}}" required>
                                  
                              </div>
                              <div class="col-sm-3">
                                  <label for="">Código de segurança:</label>
                                  <input type="text" name="cod" id="" class="form-control" value="{{old('cod')}}" maxlength="4" required>
                                  
                              </div>                      
                          </div>
                          <div class="row">
                              <div class="col-sm-4">
                                  <label for="">Data de validade:</label>                
                              </div>               
                          </div>
                          <div class="row">
                              <div class="col-sm-2">
                                  <label for="">Mês:</label>
                                  <input type="text" name="mes" id="" class="form-control" value="{{old('mes')}}" max="99" maxlength="2" required>
                                  
                              </div>
                              <div class="col-sm-2">
                                  <label for="">Ano:</label>
                                  <input type="text" name="ano" id="" class="form-control" value="{{old('ano')}}" max="99" maxlength="2" required>
                                  
                              </div>
                          </div>                           
                                      <hr>                              
                              <div class="row text-center">                    
                                  <div class="col-sm-12">
                                      <button type="submit" class="btn btn-success btn-lg btn-block" ><i class="fa fa-credit-card"></i> Efetuar pagamento e finalizar</button>
                                  </div>                    
                              </div>  
                      </div>
                </div>
            </div>
            <div id="fim" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                  
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          
                          <h4 class="modal-title">Salvando dados</h4>
                        </div>
                        <div class="modal-body">
                          <p>Aguarde, finalizando a inscrição.</p>
                          <img src="https://media.giphy.com/media/jAYUbVXgESSti/source.gif" alt="" class="img-responsive">
                        </div>
                      </div>
                  
                    </div>
                  </div>
    </form>
    <script>
        $( "#form" ).submit(function() {
            $('#fim').modal('show')
        });
    </script>
@endsection()