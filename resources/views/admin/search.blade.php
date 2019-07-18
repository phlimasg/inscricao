@extends('layouts.admin_central')
@section('content')
    <div class="row">
        <h3>Consulta de dados</h3>
    </div>
    <form action="" method="post">
        @csrf
        <div class="row" >  
            <div class="col-sm-12">
                Procure pelo <b>nº de insc., nome do candidato, dos responsáveis ou pelo cpf</b>.    
            </div>  
        </div>  
        <div class="row">
            <div class="col-sm-7">
                <div class="input-group">
                    <input type="text" name="name" class="form-control" placeholder="Nome dos resps., Cpf ou nome do candidato" autofocus>
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-search"></i> Pesquisar</button>
                    </div>
                </div>
            </div>
        </div> 
    </form>
    @if(!empty($r))
        <div class="table-responsive">
            <table class="table">
                <tbody>
        @foreach($r as $i)            
            @if($i->PAGAMENTO == 1)
                <div class="container-fluid" style="background-color: #97ffa9; color: black; font-size: 16px">
                    <br>
                    <div class="row">
                        <div class="col-sm-2">
                            <span class="glyphicon glyphicon-barcode"></span> {{$i->NINSC}}
                        </div>
                        <div class="col-sm-3">
                            <span class="glyphicon glyphicon-user"></span> {{$i->CNOME}}
                        </div>
                        <div class="col-sm-3">
                            <span class="glyphicon glyphicon-education"></span> {{$i->ACADNOME}}
                        </div>
                        <div class="col-sm-3">
                            <span class="glyphicon glyphicon-credit-card"></span> {{$i->FINNOME}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <span class="glyphicon glyphicon-education"></span>
                            <span class="glyphicon glyphicon-phone"></span>
                            {{$i->ACADTEL}}
                        </div>
                        <div class="col-sm-3">
                            <span class="glyphicon glyphicon-credit-card"></span>
                            <span class="glyphicon glyphicon-phone"></span>
                            {{$i->FINTEL}}
                        </div>
                        <div class="col-sm-3">
                            <span class="glyphicon glyphicon-credit-card"></span> Pago
                        </div>
                        <div class="col-sm-2">
                            <span class="glyphicon glyphicon-flag"></span><a target="_blank" href="{{url('/painel/'.$i->CPF)}}">{{$i->CPF}}</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <span class="glyphicon glyphicon-credit-card"></span>
                            <span class="glyphicon glyphicon-envelope"></span>
                            {{$i->FINMAIL}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <span class="glyphicon glyphicon-education"></span>
                            <span class="glyphicon glyphicon-envelope"></span>
                            {{$i->ACADEMAIL}}
                        </div>
                    </div>
                    <br>
                </div>
<hr>
            @else
                <div class="container-fluid" style="background-color: white; color: black; font-size: 16px">
                    <br>
                    <div class="row">
                        <div class="col-sm-2">
                            <span class="glyphicon glyphicon-barcode"></span> {{$i->NINSC}}
                        </div>
                        <div class="col-sm-3">
                            <span class="glyphicon glyphicon-user"></span> {{$i->CNOME}}
                        </div>
                        <div class="col-sm-3">
                            <span class="glyphicon glyphicon-education"></span> {{$i->ACADNOME}}
                        </div>
                        <div class="col-sm-3">
                            <span class="glyphicon glyphicon-credit-card"></span> {{$i->FINNOME}}
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-sm-2">
                            <span class="glyphicon glyphicon-education"></span>
                            <span class="glyphicon glyphicon-phone"></span>
                            {{$i->ACADTEL}}
                        </div>
                        <div class="col-sm-3">
                            <span class="glyphicon glyphicon-credit-card"></span>
                            <span class="glyphicon glyphicon-phone"></span>
                            {{$i->FINTEL}}
                        </div>
                        <div class="col-sm-3" style="color: red">
                            <span class="glyphicon glyphicon-credit-card"></span> <b>Aguardando pagamento</b>
                        </div>
                        <div class="col-sm-2">
                            <span class="glyphicon glyphicon-flag"></span><a target="_blank" href="{{url('/painel/'.$i->CPF)}}">{{$i->CPF}}</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <span class="glyphicon glyphicon-credit-card"></span>
                            <span class="glyphicon glyphicon-envelope"></span>
                            {{$i->FINMAIL}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <span class="glyphicon glyphicon-education"></span>
                            <span class="glyphicon glyphicon-envelope"></span>
                            {{$i->ACADEMAIL}}
                        </div>
                    </div>
                    <hr>
                </div>
            @endif()
        @endforeach
    @endif
                </tbody>
            </table>
        </div>

@endsection()