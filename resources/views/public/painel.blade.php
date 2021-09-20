@extends('layouts.layout')
@section('content')
    <div class="container-fluid title">
        <h1>Painel do responsável</h1>
    </div>

<div class="container form">
    <div class="row">
        <h2>INSCRIÇÕES EFETUADAS</h2>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Nº da insc.</th>
                <th>Nome</th>
                <th><span class="glyphicon glyphicon-info-sign"></span></th>
                <th><span class="glyphicon glyphicon-calendar"></span></th>
                <th></th>
                <th>status do pagamento</th>
            </tr>
            </thead>
            <tbody>
            @foreach($insc as $i)
                <tr>
                    <td>{{$i->NINSC}}</td>
                    <td>{{$i->CNOME}}</td>
                    <td><a href="{{url('inscricao/concluido/'.$i->id)}}" style="color: #f5c6cb"> Informações</a></td>
                    <td> @if($i->DTPROVA=="2020-06-07")agendado na secretaria @else{{date('d/m/Y', strtotime($i->DTPROVA))}} AS {{$i->HORAPROVA}}. @endif</td>
                    <td><a href="{{url('inscricao/candidato/infos/'.$i->CPF.'/'.$i->NINSC)}}" TARGET="_blank"><span class="fa fa-file-pdf-o" style="color:red"></span></a></td>
                    @if($i->PAGAMENTO == 0)
                        <td>não efetuado</td>
                    @else
                        <td>pago</td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <a href="{{url('/inscricao/'.$cpf.'/respacad')}}"> <button class="btn btn-lg btn-danger">NOVO CANDIDATO</button></a>
            <!--<a href="{{url('/')}}"> <button class="btn btn-lg btn-danger">NOVO CANDIDATO</button></a>-->
        </div>
    </div>
</div>


@endsection()