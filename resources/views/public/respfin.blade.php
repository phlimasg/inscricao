@extends('layouts.layout')
@section('content')
    <div class="container-fluid title">
        <h1>Dados do responsável financeiro</h1>
    </div>
    <form action="{{url('/inscricao/'.$cpf.'/savefin')}}" method="post">
        <div class="container-fluid form">
            <div class="container ">
                @if($errors->all())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <h2>{{ $error }}</h2>
                        @endforeach
                    </div>
                @endif
                   @csrf
                   <div class="row">
                       <div class="col-sm-9">
                           <label for="">Nome:</label>
                           <input type="text" required class="form-control" autofocus name="nome" value="@if (Session::get('aluno')){{Session::get('aluno')->RESPFIN}} @else {{old('nome')}} @endif">
                       </div>
                       <div class="col-sm-3">
                           <label for="">Data de Nascimento:</label>                           
                           
                           <input type="date" required class="form-control" name="data" value="@if (Session::get('aluno')){{date('Y-m-d',strtotime(str_replace('/','-',Session::get('aluno')->RESPFINDTNASCIMENTO)))}}@else{{old('data')}}@endif">
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-sm-3">
                           <label for="">Telefone:</label>
                           <input type="text" required class="form-control"  id="tel" name="tel" value="@if (Session::get('aluno')){{Session::get('aluno')->RESPFINTELCEL}} @else {{old('tel')}} @endif">
                       </div>
                       <div class="col-sm-9">
                           <label for="">email:</label>
                           <input type="email" required class="form-control" name="email" value="@if (Session::get('aluno')){{Session::get('aluno')->RESPFINEMAIL}} @else {{old('email')}} @endif">
                       </div>
                   </div>
                    <hr>
                    <h2>Naturalidade</h2>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="">Cidade:</label>
                            <input type="text" required class="form-control"  name="cidade">
                        </div>
                        <div class="col-sm-2">
                            <label for="">Estado:</label>
                            <select name="estado" id="" required class="form-control">
                                <option value="AC">AC</option>
                                <option value="AL">AL</option>
                                <option value="AP">AP</option>
                                <option value="AM">AM</option>
                                <option value="BA">BA</option>
                                <option value="CE">CE</option>
                                <option value="DF">DF</option>
                                <option value="ES">ES</option>
                                <option value="GO">GO</option>
                                <option value="MA">MA</option>
                                <option value="MS">MS</option>
                                <option value="MG">MG</option>
                                <option value="PB">PB</option>
                                <option value="PR">PR</option>
                                <option value="PE">PE</option>
                                <option value="PI">PI</option>
                                <option value="RJ" selected>RJ</option>
                                <option value="RN">RN</option>
                                <option value="RS">RS</option>
                                <option value="RO">RO</option>
                                <option value="RR">RR</option>
                                <option value="SC">SC</option>
                                <option value="SP">SP</option>
                                <option value="SE">SE</option>
                                <option value="TO">TO</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-lg btn-danger btn-login">SALVAR</button>
                    </div>
                </div>
            </div>

    </form>
    <script>
        $(function() {
            var SPMaskBehavior = function (val) {
                    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                },
                spOptions = {
                    onKeyPress: function (val, e, field, options) {
                        field.mask(SPMaskBehavior.apply({}, arguments), options);
                    }
                };

            $('#tel').mask(SPMaskBehavior, spOptions);

        });
    </script>
@endsection()