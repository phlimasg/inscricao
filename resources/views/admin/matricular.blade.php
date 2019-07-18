@extends('layouts.admin_central')
@section('content')
    <div class="row">
        <h3>Matricular Candidato</h3>
    </div>
    <form action="" method="post">
        @csrf
        <div class="row" >  
            <div class="col-sm-12">
                Procure pelo nome do candidato.
            </div>
        </div>  
        @if(session('message'))
            <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        <div class="row">
            <div class="col-sm-6">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Nome do candidato" autofocus>
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-search"></i> Procurar</button>
                    </div>                    
                </div>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach 
            </div>
        </div> 
    </form>
    
    @if(!empty($r))
    <hr>
        <div class="table-responsive">
            <table class="table">
                <tbody>
        @foreach($r as $i)                        
                <div class="container-fluid" style=" color: black; font-size: 16px">
                    <br>
                    <div class="row">
                        <div class="col-sm-2">
                            <span class="glyphicon glyphicon-barcode"></span> {{$i->id}}
                        </div>
                        <div class="col-sm-5">
                            <span class="glyphicon glyphicon-user"></span> {{$i->NOME}}
                        </div>
                        <div class="col-sm-1">
                        <a href="{{url('/home/central/matricula/').'/'.$i->id}}" class="btn btn-danger">Matricular</a>    
                        </div>                        
                    </div>                    
                    <br>
                </div>
<hr>
        @endforeach
    @endif
                </tbody>
            </table>
        </div>

@endsection()