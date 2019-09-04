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
            </tr>
          </thead>
          <tbody>
              @forelse ($lista as $i)
              <tr>
              <td>{{$i->id}}</td>
                <td><a href="#" data-toggle="modal" data-target="#{{$i->id}}">{{$i->NOME}}</a></td>
                <td>{{$i->ESCOLARIDADE}}</td>
                <td>{{$i->ANO}}</td>
                <td>{{$i->TURNO}}</td>
                <td><a href="/inscricao/candidato/prova/{{$i->CPF}}/{{$i->id}}" target="_blank"><i class="glyphicon glyphicon-calendar"></i></a></td>
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
                </tr> 
                @endif                  
              @empty
                  
              @endforelse
              
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