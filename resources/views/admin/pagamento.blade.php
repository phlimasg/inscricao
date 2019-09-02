@extends('layouts.admin_tesouraria')
@section('content')
    <h3>Controle de Pagamento</h3>
    @if(!empty($_GET['vagas']))
        <br>
        <div class="alert alert-danger">
            <strong>Desculpe,</strong> mas não há vagas para esse ano de escolaridade. <br>
            clique <a href="{{url('/home')}}">aqui</a>  e veja a disponibilidade de outra turma.
        </div>
    @endif
    @if(!empty($_GET['data']))
        <br>
        <div class="alert alert-danger">
            <h2>Pagamento não efetuado!</h2>
            <h3>O candidato foi inserido na lista de espera.</h3>
            <strong>Ooops,</strong> tivemos problemas com o preenchimento da data de nascimento do candidato. <br>
            Por favor, direcione-se para a central de atendimento e faça um novo cadastro. :D
        </div>
    @endif
    <form action="" method="post">
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <label for="">Procurar inscrição</label>
                <input type="text" name="search" class="form-control" autofocus placeholder="NOME DO CANDIDATO, RESP, CPF OU Nº DA INSCRIÇÃO">
            </div>
            <div class="col-sm-3">
                <br>
                <button type="submit" class="btn btn-lg btn-danger"> PROCURAR</button>
            </div>
        </div>
    </form>

    @if(!empty($search))
        <hr>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>Nº</th>
                    <th>CANDIDATO</th>
                    <th>STATUS DO PG.</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($search as $s)
                <tr>
                    <td>{{$s->NINSC}}</td>
                    <td>{{$s->CNOME}}</td>
                    @if($s->PAGAMENTO == 0)
                        <td>NÃO EFETUADO</td>
                    @else
                        <td>pago</td>
                    @endif
                    <td><button class="btn btn-success" data-toggle="modal" data-target="#{{$s->NINSC}}">PAGAR</button></td>
                    <td><button class="btn btn-danger" data-toggle="modal" data-target="#c{{$s->NINSC}}">CANCELAR</button></td>
                    <div id="{{$s->NINSC}}" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">CONFIRMAR PAGAMENTO?</h4>
                                </div>
                                <div class="modal-body">
                                    <p>CONFIRMA O PAGAMENTO PARA A INsCRIÇÃO Nº{{$s->NINSC}}?</p>
                                </div>
                                <div class="modal-footer">
                                    <a target="_blank" href="{{url('home/pagamento').'/'.$s->NINSC}}"> <button type="button" class="btn btn-success">CONFIRMAR</button></a>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">CANCELAR</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div id="c{{$s->NINSC}}" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">CANCELAR PAGAMENTO?</h4>
                                </div>
                                <div class="modal-body">
                                    <p>DESEJA CANCELAR O PAGAMENTO PARA A INsCRIÇÃO Nº{{$s->NINSC}}?</p>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{url('home/pagamento/cancelar').'/'.$s->NINSC}}"> <button type="button" class="btn btn-success">CONFIRMAR</button></a>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">CANCELAR</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    @endif
@endsection()