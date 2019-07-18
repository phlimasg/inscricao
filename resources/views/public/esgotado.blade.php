@extends('layouts.layout')
@section('content')
    <div class="container-fluid title">
        <h1>Vagas esgotadas</h1>
    </div>
    <div class="container-fluid form">
        <div class="container ">
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    Prezado(a) responsável, <br><br>informamos que as vagas para esse turno estão esgotadas.
                    <br>
                    Seus dados foram salvos em nosso cadastro de interesse, você também pode fazer uma nova inscrição alterando o turno escolhido.
                </div>
            </div>
            <div class="row">
                <a href="{{url('inscricao/'.$cpf.'/respacad')}}">
                    <button type="button" class="btn btn-lg btn-danger btn-login">NOVO CANDIDATO</button>
                </a>
            </div>
        </div>
    </div>
@endsection()