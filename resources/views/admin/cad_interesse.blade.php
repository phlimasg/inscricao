@extends('layouts.admin_central')
@section('content')
    <h3>Email para o cadastro de interesse</h3>
    <form action="" method="post">
        @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="" class="form-control">
                </div>
                <div class="col-sm-5">
                    <label for="nome">Email</label>
                    <input type="text" name="email" id="" class="form-control">
                </div>                
            </div>
            <br>
            <div class="row">
                <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
            </div>
        </div>
    </form>
@endsection()