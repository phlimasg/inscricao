@extends('layouts.layout')
@section('content')
    <div class="container-fluid title text-center">
        <h1>Inscrição para alunos novos {{date('m')>=7 ? date('Y')+1: date('Y')}}</h1>
        
    </div>
    <div class="container-fluid form">
        <div class="container ">
           <form action="{{route('validaCpf')}}" method="post">
               @csrf
               <div class="row">
                   <div class="text-center">
                       <label for="">Insira o CPF do Responsável Financeiro:</label>
                   </div>
               </div>
               <div class="row">
                   <div class="text-center">
                       <input type="text" required id="cpf" name="cpf" class="form-control text-center" autofocus >
                   </div>
               </div>
               <div class="row">
                   <div class="">
                       <button class="btn btn-lg btn-danger btn-login">ENTRAR</button>
                   </div>
               </div>
               @php
                   Session::forget('aluno');
               @endphp
           </form>
        </div>
    </div>
    @if($errors->first('cpf'))
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Erro</h4>
                    </div>
                    <div class="modal-body">
                        <h2>{{$errors->first('cpf')}}</h2>
                        Por favor, verifique os dados.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $("#myModal").modal();
        </script>
    @endif
    <script>
        $(function($){
            $("#cpf").mask("999.999.999-99");
        });
    </script>

@endsection()