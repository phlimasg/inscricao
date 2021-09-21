@extends('layouts.layout')
@section('content')
    <div class="container-fluid title">
        <h1>Reunião com a Coordenação</h1>
    </div>
    @if ($errors->any())
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-danger">    
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>      
        </div>
    @endif
                
    <form action="{{route('inscrever')}}" method="post" id="form">
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
                                    @if ($dia->DTPROVA == '2020-06-07')
                                        <option selected value="{{$dia->id}}">Entraremos em contato</option>
                                    @else
                                        <option selected value="{{$dia->id}}">{{date('d/m/Y', strtotime($dia->DTPROVA))}} AS {{$dia->HORAPROVA}} </option>                                         
                                    @endif
                                    @php
                                        //break;
                                    @endphp                              
                                @endif
                               @endforeach
                           </select>
                           <b>Aviso:</b> Creches 2 e 3 não farão avaliação, somente reunião com os responsáveis.
                       </div>
                   </div>

                   @if (empty(Session::get('aluno')))
                       
                        <h3><i class="fa fa-credit-card"></i> Dados para pagamentos com cartão de crédito: </h3>                   
                        <div class="row">
                            <div class="col-sm-12">
                            <h2 class=""><b>Valor: R$ 60,00</b></h2>  
                            </div>
                            @if(session('error'))
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="alert alert-danger">
                                        <b>ERRO NO PAGAMENTO, TENTE NOVAMENTE</b>                                    
                                        
                                        <p>Mensagem: {{session('error')['message']}}</p>
                                        <p>Código de erro:{{session('error')['status_code']}}</p>
                                        {!! !empty(session('error')['details'][0]['description'])? '<p>Descrição do erro: '.session('error')['details'][0]['description'].'</p>':''!!}
                                        {!! !empty(session('error')['details'][0]['description_detail'])? '<p>Detalhes do erro: '.session('error')['details'][0]['description_detail'].'</p>':''!!}
                                        {!! !empty(session('error')['details'][0]['error_code'])? '<p>Código do operadora: '.session('error')['details'][0]['error_code'].'</p>':''!!}
                                        {!! !empty(session('error')['details'][0]['antifraud']['status_code'])? '<p>Antifraude: '.session('error')['details'][0]['antifraud']['status_code'].'-'.session('error')['details'][0]['antifraud']['description'].'</p>':''!!}                                    
                                        
                                    </div>
                                </div>      
                            </div>  
                        @endif
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
                                    <input type="text" name="ano" id="" class="form-control" value="{{old('ano')}}" max="{{date('Y')+10}}" maxlength="4">
                                    
                                </div>
                            </div>                           
                                        <hr>                              
                   @endif
                              <div class="row text-center">                    
                                  <div class="col-sm-12" style="margin-top: 15px;">
                                        <button type="submit" class="btn btn-success btn-lg btn-block" >
                                            @if (empty(Session::get('aluno')))
                                                <i class="fa fa-credit-card"></i> Efetuar pagamento e finalizar
                                            @else
                                                <i class="fa fa-users"></i> Finalizar Inscrição
                                            @endif
                                        </button>
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