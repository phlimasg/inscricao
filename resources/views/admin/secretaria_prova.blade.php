@extends('layouts.admin_secretaria')
@section('content')
<div class="container-fluid">
    <h3>Alterar data de prova</h3>
    <form action="" method="post">
        Procurar candidato:
       <div class="row">
           @csrf
           <div class="col-sm-3">
               <input type="text" name="busca" class="form-control" placeholder="Pesquise pelo nome do candidato" required>
           </div>
           <div class="col-sm-2">
               <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Procurar</button>
           </div>
       </div>
    </form>
    @if($errors->any())
        <hr>
        @if($errors->first() == 1)
        <div class="alert alert-success fade in">
            <strong>Sucesso!</strong> Data da prova alterada!
        </div>
            @else
            <div class="alert alert-danger fade in">
                <strong>Erro!</strong> Por favor, tente Novamente. :/
            </div>
            @endif
    @endif
    @if(!empty($msg))
        {{$msg}}
        @endif
    @if(!empty($busca))
        <hr>
        @foreach($busca as $b)
            <form action="{{route('alterarDataSave')}}" method="post" name="{{$b->id}}">
                <input type="text" hidden value="{{$b->id}}" name="id_insc">
                @csrf
            <div class="row">
                <div class="col-sm-3">
                    {{$b->NOME}}
                </div>
                <div class="col-sm-2">
                    {{date("d/m/Y", strtotime($b->DTPROVA))}}
                </div>
                <div class="col-sm-2">
                    <select name="id_aval" id="" class="form-control" required>
                        <option value=""></option>
                        @foreach($dt as $d)
                            <option value="{{$d->id}}">{{date("d/m/Y", strtotime($d->DTPROVA))}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-3">
                    @if($b->PAGAMENTO == 1)
                        PAGO
                        @else
                    Pagamento não efetuado
                        @endif
                </div>
                <div class="col-sm-2">
                    <a href="#" data-toggle="modal" data-target="#{{$b->id}}" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Alterar</a>
                </div>
            </div>
            <div class="modal fade" id="{{$b->id}}" role="dialog">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Confirma alteração?</h4>
                        </div>
                        <div class="modal-body">
                            <p>Deseja realmente alterar a data de prova do(da) <b>{{$b->NOME}}</b>?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="submit"  class="btn btn-success">Sim</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        @endforeach
    @endif
</div>
@endsection()