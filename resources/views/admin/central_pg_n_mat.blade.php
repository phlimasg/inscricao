@extends('layouts.admin_central')
@section('content')
<div class="row">
    <div class="col-sm-6">
        <h3>Candidatos pagos e não matriculados</h3>
    </div>
    <div class="col-sm-6">
            {{ $naoMat->links() }}
    </div>
</div>


        <div class="table-responsive">          
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Nome</th>
              <th>Escolaridade</th>
              <th>Ano</th>
              <th>Turno</th>
              <th>Dt. Prova</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
              @forelse ($naoMat as $i)
              <tr>
              <td>{{$i->NINSC}}</td>
                <td><a href="#" data-toggle="modal" data-target="#{{$i->id}}">{{strtoupper($i->CNOME)}}</a></td>
                <td>{{$i->ESCOLARIDADE}}</td>
                <td>{{$i->ANO}}</td>
                <td>{{$i->TURNO}}</td>
                <td>    
                        {{date('d/m/Y', strtotime($i->DTPROVA))}}                
                    <!--<a href="/inscricao/candidato/prova/{{$i->CPF}}/{{$i->id}}" target="_blank"><i class="glyphicon glyphicon-calendar"></i></a>-->
                </td>
            <td>
                <!--<a href="#" data-toggle="modal" data-target="#excluir_{{$i->id}}"> <i class="glyphicon glyphicon-remove"></i> </a></td>-->
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
                            <h4 class="modal-title">Dados do candidato(a) {{$i->CNOME}}</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="">Resp. Acadêmico</label>
                                    </div>
                                </div>
                            <div class="row">                               
                                <div class="col-sm-4">
                                    <label for="">Nome:</label> {{$i->ACADNOME}}
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Email.:</label> {{$i->ACADEMAIL}}
                                </div>
                                <div class="col-sm-3">
                                        <label for="">Tel.:</label> {{$i->ACADTEL}}
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
                                    <label for="">Nome:</label> {{$i->FINNOME}}
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Email.:</label> {{$i->FINMAIL}}
                                </div>
                                <div class="col-sm-3">
                                        <label for="">Tel.:</label> {{$i->FINTEL}}
                                    </div>
                            </div>
                            <form action="{{ route('add_historico') }}" method="post">
                                @csrf
                                <hr>
                                <div class="row">  
                                <input type="hidden" name="id" value="{{$i->NINSC}}">                                  
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
                            @foreach ($i->historico as $h)
                            <div class="alert alert-info">
                                <div class="row">
                                    <div class="col-sm-12">
                                        {{$h->observacao}}
                                    </div>                                    
                                </div>
                                <div class="row">
                                        <div class="col-sm-3">
                                                Data: {{date('d/m/Y h:i',strtotime($h->created_at))}}
                                            </div>
                                            <div class="col-sm-7">
                                                    Usuário: {{$h->user}}
                                            </div>
                                </div>
                            </div>
                            @endforeach
                        <!--<iframe src="{{ url('painel/'.$i->CPF) }}" frameborder="0" width="100%" style="min-height: 550px;"></iframe>-->
                                

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
        {{ $naoMat->links() }}
      
@endsection()