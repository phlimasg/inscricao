@extends('layouts.admin_central')
@section('content')
<h3>Pagamentos não efetuados - Total de {{$total}} candidatos</h3>
        <div class="table-responsive">          
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Nome</th>
              <th>Escolaridade</th>
              <th>Ano</th>
              <th>Turno</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
              @forelse ($naoPagos as $i)
              <tr>
              <td>{{$i->id}}</td>
                <td><a href="#" data-toggle="modal" data-target="#{{$i->id}}">{{strtoupper($i->NOME)}}</a></td>
                <td>{{$i->ESCOLARIDADE}}</td>
                <td>{{$i->ANO}}</td>
                <td>{{$i->TURNO}}</td>
                <td>                    
                    <!--<a href="/inscricao/candidato/prova/{{$i->CPF}}/{{$i->id}}" target="_blank"><i class="glyphicon glyphicon-calendar"></i></a>-->
                </td>
            <td>
                <a href="#" data-toggle="modal" data-target="#excluir_{{$i->id}}"> <i class="glyphicon glyphicon-remove"></i> </a></td>
              </tr>
              
              <div id="excluir_{{$i->id}}" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">
                
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Remover?</h4>
                        </div>
                        <div class="modal-body">
                            Confirma a remoção da inscrição do candidato {{$i->NOME}}?
                        </div>
                        <div class="modal-footer">
                            <a href="/home/central/pagamento/{{$i->id}}" class="btn btn-primary">Sim</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                
                    </div>
                </div> 
              
                <div id="{{$i->id}}" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">
                    
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Dados do candidato(a) {{$i->NOME}}</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="">Resp. Acadêmico</label>
                                    </div>
                                </div>
                            <div class="row">                               
                                <div class="col-sm-4">
                                    <label for="">Nome:</label> {{$i->acadNome}}
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Email.:</label> {{$i->acadEmail}}
                                </div>
                                <div class="col-sm-3">
                                        <label for="">Tel.:</label> {{$i->acadTel}}
                                    </div>
                            </div>
<br>
                            <div class="row">
                                    <div class="col-sm-3">
                                        <label for="">Resp. Financeiro</label>
                                    </div>
                                </div>
                            <div class="row">                               
                                <div class="col-sm-4">
                                    <label for="">Nome:</label> {{$i->finNome}}
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Email.:</label> {{$i->finEmail}}
                                </div>
                                <div class="col-sm-3">
                                        <label for="">Tel.:</label> {{$i->finTel}}
                                    </div>
                            </div>
                        <iframe src="{{ url('painel/'.$i->CPF) }}" frameborder="0" width="100%" style="min-height: 550px;"></iframe>
                                

                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    
                        </div>
                    </div>                  
              @empty
                  Vazio
              @endforelse
          </tbody>
        </table>
        </div>
        {{ $naoPagos->links() }}
      
@endsection()