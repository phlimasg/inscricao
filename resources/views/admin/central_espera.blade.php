@extends('layouts.admin_central')
@section('content')
    <h3>Lista de Espera</h3>
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
              @forelse ($lista as $i)
              <tr @if (!empty($i->historico[0]->observacao))
                style="background-color: lightgrey"
              @endif>
              <td>{{$i->id}}</td>
                <td><a href="#" data-toggle="modal" data-target="#{{$i->id}}">{{$i->NOME}}</a></td>
                <td>{{$i->ESCOLARIDADE}}</td>
                <td>{{$i->ANO}}</td>
                <td>{{$i->TURNO}}</td>
                <td>                    
                    <a href="/inscricao/candidato/prova/{{$i->CPF}}/{{$i->id}}" target="_blank"><i class="glyphicon glyphicon-calendar"></i></a>
                </td>
            <td><a href="#" data-toggle="modal" data-target="#excluir_{{$i->id}}"> <i class="glyphicon glyphicon-remove"></i> </a></td>
              </tr>
              @forelse ($lista_insc as $l)
                @if ($i->CPF == $l->RESPFIN_CPF && $i->id != $l->CANDIDATO_ID)
                <tr style="background-color: lightpink">
                    <td>{{$l->id}}</td>
                    <td><a href="/painel/{{$l->RESPFIN_CPF}}" target="_blank">{{$l->NOME}}</a></td>
                    <td>{{$l->ESCOLARIDADE}}</td>
                    <td>{{$l->ANO}}</td>
                    <td>{{$l->TURNO}}</td>
                    <td></td>
                    <td></td>
                </tr>
                @endif 
                                
              @empty
                  
              @endforelse
              <div id="excluir_{{$i->id}}" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">
                
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Remover?</h4>
                        </div>
                        <div class="modal-body">
                            Confirma a remoção do candidato {{$i->NOME}} da lista de espera?
                        </div>
                        <div class="modal-footer">
                            <a href="/home/central/espera/{{$i->id}}" class="btn btn-primary">Sim</a>
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
                            <form action="{{ route('add_historico') }}" method="post">
                                @csrf
                                <hr>
                                <div class="row">  
                                <input type="hidden" name="id" value="{{$i->id}}">                                  
                                <input type="hidden" name="tabela" value="Lista de Espera">  
                                    <div class="col-sm-10">
                                        <label for="">Adicionar observação:</label>
                                        <textarea cols="30" rows="3" class="form-control" name="observacao"></textarea>
                                    </div>
                                    <div class="col-sm-2">
                                        <br>
                                        <button class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span> Adicionar</button>
                                    </div>
                                </div>
                            </form>  
                            <h3>Observação:</h3>
                            @foreach ($i->historico->where('tabela','Lista de Espera') as $h)
                                <div class="alert alert-info">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            {{$h->observacao}}
                                        </div>                                    
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            Data: {{date('d/m/Y H:i',strtotime($h->created_at))}}
                                        </div>
                                        <div class="col-sm-7">
                                                Usuário: {{$h->user}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
      
@endsection()