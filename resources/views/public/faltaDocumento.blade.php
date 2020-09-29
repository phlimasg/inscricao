@extends('layouts.layout')
@section('content')
    <div class="container-fluid title">
    <h1>Documentos de {{$candidato->NOME}}</h1>
    </div>
    <form id="form" action="{{ route('documentosfaltantes', ['cpf'=>$candidato->RESPFIN_CPF,'id'=>$candidato->id]) }}" method="post" enctype="multipart/form-data" id="formCandidato">
        <div class="container-fluid form">
            <div class="container ">
                @if (session('mensagem'))
                    <div class="alert alert-success">
                        {{ session('mensagem') }}
                    </div>
                @endif
                @if($errors->all())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <h2>{{ $error }}</h2>
                        @endforeach
                    </div>
                @endif
                <h3>Mensagem da secretaria:</h3>
                <div class="alert alert-warning">
                    {!! $candidato->Mensagens()->latest()->first()->mensagem !!}
                </div>
                   @csrf                                        
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="">Anexe o(os) comprovante(es)</label>
                            <input type="file" name="documento[]" id="" max-size="5000" class="form-control" required accept="image/jpg, image/jpeg, application/pdf" multiple>
                            <small>Max. de 5Mb</small>
                        </div>
                    </div>
                    <hr>                              
                    <div class="row text-center">                    
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-success btn-lg btn-block"><i class="fa fa-credit-card"></i> Enviar documentos e finalizar</button>
                        </div>                    
                    </div>  
            </div>
        </div>
    </div>
    <div id="fim" class="modal fade" role="dialog">
        <div class="modal-dialog">
      
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title">Salvando dados</h4>
            </div>
            <div class="modal-body">
              <p>Aguarde, finalizando a inscrição.</p>
              <img src="https://media.giphy.com/media/jAYUbVXgESSti/source.gif" alt="" class="img-responsive">
            </div>
          </div>
      
        </div>
      </div>
    <script>
        $('#form').submit(function(){
            $('#fim').modal('show');
        });
    </script>
@endsection()