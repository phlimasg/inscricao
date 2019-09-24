@extends('layouts.admin_secretaria')
@section('content')
    <h3>Lista de Presença</h3>
    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>Dia da avaliação</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($q as $a)
                    <tr>
                        <td>{{date('d/m/Y',strtotime($a->DTPROVA))}}</td>
                        <td><a target="_blank" href="{{route('lstPresenca',['id'=> $a->id])}}" data-toggle="tooltip" data-placement="right" title="Lista de Presença"><span class="glyphicon glyphicon-user text-danger"></span> Gerar lista de presença</a></td>
                        <td><a href="{{route('etiqueta',['id' => $a->id])}}"  data-toggle="tooltip" data-placement="left" title="Gerar Etiquetas"><span class="glyphicon glyphicon-barcode text-success"></span> Gerar Etiquetas</a></td>
                        <td><a href="{{route('etiqueta-kit',['id' => $a->id])}}"  data-toggle="tooltip" data-placement="left" title="Gerar Etiquetas"><span class="glyphicon glyphicon-barcode text-danger"></span> Etiquetas para kit</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>



@endsection()