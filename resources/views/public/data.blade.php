@extends('layouts.layout')
@section('content')
    <div class="container-fluid title">
        <h1>Dia da Avaliação</h1>
    </div>
    <form action="{{route('inscrever')}}" method="post">
        <input type="text" value="{{$cpf}}" hidden name="cpf">
        <input type="text" value="{{$id_candidato}}" hidden name="id_candidato">
        <div class="container-fluid form">
            <div class="container ">
                   @csrf
                   <div class="row">
                       <div class="col-sm-3">
                           <label for="">Selecione o dia da Avaliação:</label>
                           <select name="avaliacao_id" id="" class="form-control" required>
                               <option value=""></option>
                               @foreach($a as $dia)
                               <option value="{{$dia->id}}">{{date('d/m/Y', strtotime($dia->DTPROVA))}} AS 8H</option>
                               @endforeach
                           </select>
                       </div>
                   </div>
                    <div class="row">
                        <button type="submit" class="btn btn-lg btn-danger btn-login">SALVAR</button>
                    </div>
                </div>
            </div>

    </form>
@endsection()