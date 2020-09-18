@extends('layouts.layout')
@section('content')
    <div class="container-fluid title">
        <h1>Reunião com a Coordenação</h1>
    </div>
    <form action="{{route('inscrever')}}" method="post">
        <input type="text" value="{{$cpf}}" hidden name="cpf">
        <input type="text" value="{{$id_candidato}}" hidden name="id_candidato">
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
                       <div class="col-sm-4">
                           <label for="">Escolha o dia:</label>
                           <select name="avaliacao_id" id="" class="form-control" required>
                               <option value=""></option>
                               @foreach($a as $dia)
                                @if($dia->qtdInscritos()->count() < $dia->VAGAS)
                                    <option value="{{$dia->id}}">{{date('d/m/Y', strtotime($dia->DTPROVA))}} AS {{$dia->HORAPROVA}} </option> 
                                    @php
                                        break;
                                    @endphp                              
                                @endif
                               @endforeach
                           </select>
                       </div>
                   </div>
<h3>                   <i class="fa fa-credit-card"></i> Dados para pagamentos com cartão de crédito: </h3>                   
                        <div class="row">
                          <div class="col-sm-12">
                            <h2 class=""><b>Valor: R$ 50,00</b></h2>  
                          </div>
                        </div>   
                              <div class="row">
                                  <div class="col-sm-6">
                                      <label for="">Nome do titular do cartão:</label>
                                  <input type="text" name="nome" id="" class="form-control" value="{{old('nome')}}">
                                  
                                  </div>            
                              </div>        
                              
                          <div class="row">
                              <div class="col-sm-6">
                                  <label for="">Número do cartão:</label>
                                  <input type="text" name="numero" id="" class="form-control" value="{{old('numero')}}">
                                  
                              </div>
                              <div class="col-sm-3">
                                  <label for="">Código de segurança:</label>
                                  <input type="text" name="cod" id="" class="form-control" value="{{old('cod')}}" maxlength="4">
                                  
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
                                  <input type="text" name="mes" id="" class="form-control" value="{{old('mes')}}" max="99" maxlength="2">
                                  
                              </div>
                              <div class="col-sm-2">
                                  <label for="">Ano:</label>
                                  <input type="text" name="ano" id="" class="form-control" value="{{old('ano')}}" max="99" maxlength="2">
                                  
                              </div>
                          </div>   
                                      <hr>                              
                              <div class="row text-center">                    
                                  <div class="col-sm-12">
                                      <button type="submit" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#fim"><i class="fa fa-credit-card"></i> Efetuar pagamento e finalizar</button>
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
@endsection()