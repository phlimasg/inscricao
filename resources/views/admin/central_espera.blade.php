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
                <td>{{$i->NOME}}</td>
                <td>{{$i->ESCOLARIDADE}}</td>
                <td>{{$i->ANO}}</td>
                <td>{{$i->TURNO}}</td>
                <td><a href="http://" ><i class="glyphicon glyphicon-envelope"></i></a></td>
              </tr>                  
              @empty
                  
              @endforelse
          </tbody>
        </table>
        </div>      
      
@endsection()