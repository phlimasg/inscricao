@extends('layouts.layout')
@section('content')
    <div class="container-fluid title">
        <h1>Dados do Candidato - Aluno(a)</h1>
    </div>
    <form action="{{url('inscricao/candidato/save/'.$cpf)}}" method="post">
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
                        <div class="col-sm-4">
                            <label for="esc">escolaridade pretendida</label>
                            <select name="esc" id="esc" class="form-control">
                                <option value=""></option>
                                @foreach($escolaridade as $e)
                                    <option value="{{$e->escolaridade}}">{{$e->escolaridade}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="ano">ano</label>
                            <select name="ano" id="ano" class="form-control">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="turno">turno</label>
                            <select name="turno" id="turno" class="form-control">
                                <option value=""></option>
                            </select>
                        </div>
                        <div id="result"></div>
                    </div>
                    <div id="dadosDoAluno" style="display: none">
                   <div class="row">
                       <div class="col-sm-6">
                           <label for="">Nome:</label>
                           <input type="text" required class="form-control"  name="nome" placeholder="NOME COMPLETO">
                       </div>
                       <div class="col-sm-3">
                           <label for="tel">Telefone:</label>
                           <input type="text" required class="form-control"  name="tel" placeholder="(00) 00000-0000">
                       </div>
                       <div class="col-sm-3" id="divData">

                       </div>
                   </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="">cep:</label>
                            <input type="text" required class="form-control"  name="cep" id="cep">
                        </div>
                        <div class="col-sm-8">
                            <label for="">endereço:</label>
                            <input type="text" required class="form-control" id="rua" name="rua">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="">bairro:</label>
                            <input type="text" required class="form-control"  name="bairro" id="bairro">
                        </div>
                        <div class="col-sm-4">
                            <label for="">cidade:</label>
                            <input type="text" required class="form-control" id="cidade" name="cidade">
                        </div>
                        <div class="col-sm-2">
                            <label for="">Estado:</label>
                            <select name="estado" id="uf" required class="form-control">
                                <option value=""></option>
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
                    <h2>Naturalidade</h2>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="">Cidade:</label>
                            <input type="text" required class="form-control"  name="nat_cidade">
                        </div>
                        <div class="col-sm-2">
                            <label for="">Estado:</label>
                            <select name="nat_estado" id="" required class="form-control">
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
                        <div class="row form">
                            <div class="col-sm-12">
                                <label>O Candidato é ex-aluno?</label>
                                <label class="radio-inline"><input type="radio" name="exAluno" value="s" >sim</label>
                                <label class="radio-inline"><input type="radio" name="exAluno" value="n" checked>não</label>
                            </div>
                        </div>
                    <div class="row ">
                        <div class="col-sm-12">
                            <label>Portador de necessidades especiais?</label>
                            <label class="radio-inline"><input type="radio" name="rNesp" value="s" onclick="$('#espQ').show('100');">sim</label>
                            <label class="radio-inline"><input type="radio" name="rNesp" value="n" checked onclick="$('#espQ').hide('100');">não</label>
                        </div>
                    </div>
                    <div class="row" id="espQ" style="display: none">
                        <div class="col-sm-12">
                            <label for="">quais?</label>
                            <input type="text" class="form-control"  name="nEsp">
                        </div>
                    </div>

                    <hr>
                    <h2>filiação 1</h2>
                        <div class="row">
                            <div class="col-sm-8">
                                <label for="">Nome:</label>
                                <input type="text" required class="form-control" name="nomef1">
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="">Data de Nascimento:</label>
                            <input type="date" required class="form-control" name="dataf1">
                        </div>
                        <div class="col-sm-4">
                            <label for="">Cidade:</label>
                            <input type="text" required class="form-control"  name="cidadef1">
                        </div>
                        <div class="col-sm-2">
                            <label for="">Estado:</label>
                            <select name="estadof1" id="" required class="form-control">
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
                    <h2>filiação 2</h2>
                        <div class="row">
                            <div class="col-sm-8">
                                <label for="">Nome:</label>
                                <input type="text" required class="form-control" name="nomef2">
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="">Data de Nascimento:</label>
                            <input type="date" required class="form-control" name="dataf2">
                        </div>
                        <div class="col-sm-4">
                            <label for="">Cidade:</label>
                            <input type="text" required class="form-control"  name="cidadef2">
                        </div>
                        <div class="col-sm-2">
                            <label for="">Estado:</label>
                            <select name="estadof2" id="" required class="form-control">
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
                    </div>
                    <div class="row">
                        <button class="btn btn-lg btn-danger btn-login">SALVAR</button>
                    </div>
                </div>
            </div>
    </form>
    <div id="loading" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content modal-loading">
                <div class="modal-body" align="center">
                    <img src="{{url('images/loading.gif')}}" alt="" width="150px"><br>
                    Carregando dados...
                </div>
            </div>

        </div>
    </div>

    <!-- Modal -->
<div id="aviso" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Aviso!</h4>
        </div>
        <div class="modal-body">
          <p>Os casos de candidatos fora da faixa etária serão aceitos mediante comprovação escolar, conforme legislação vigente.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
        </div>
      </div>
  
    </div>
  </div>

    </div>


    </div>

    <script>
        $("#aviso").modal();
        $(function($){
            var SPMaskBehavior = function (val) {
                    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                },
                spOptions = {
                    onKeyPress: function (val, e, field, options) {
                        field.mask(SPMaskBehavior.apply({}, arguments), options);
                    }
                };

            $('#tel').mask(SPMaskBehavior, spOptions);
            $("#cep").mask("99999-999");
        });

        $('#esc').change(function() {
            $("#loading").modal();
            var esc = $("#esc").val();
            if(esc != ''){
                $("#result").html('<div align="center"><img src="http://acesso.abel.org.br/images/load.gif" alt="" width="50"><br>Aguarde...</div>');
                $.getJSON("{{url('/inscricao/candidato/')}}/"+ esc +"/ano", function(data) {
                    $('#ano').empty();
                    $('#turno').empty();
                    $('#ano').append("<option value=''></option>");
                    $.each(data, function(index, element) {
                        $('#ano').append("<option value='"+ element.ANO +"'>" + element.ANO + "</option>");
                    });
                });
                $("#result").empty();
            }
            else{
                $('#ano').empty();
                $('#turno').empty();
                $('#dadosDoAluno').hide(500);
            }
            $("#loading").modal('hide');
        });

        $('#ano').change(function() {
            $("#loading").modal();
            var esc = $("#esc").val();
            var ano = $("#ano").val();
            if(esc != '' && ano !=''){
                $("#result").html('<div align="center"><img src="http://acesso.abel.org.br/images/load.gif" alt="" width="50"><br>Aguarde...</div>');
                $.getJSON("{{url('/inscricao/candidato/')}}/"+ esc +'/'+ ano, function(data) {
                    $('#turno').empty();
                    $('#turno').append("<option value=''></option>");
                    $.each(data, function(index, element) {
                        $('#turno').append("<option value='"+ element.ID +"'>" + element.TURNO + "</option>");
                    });
                });
                $("#result").empty();
            }
            else {
                $('#turno').empty();
                $('#dadosDoAluno').hide(500);
            }
            $("#loading").modal('hide');
        });

        $('#turno').change(function () {
            $("#loading").modal();
            var id = $("#turno").val();
            $('#divData').empty();
            if($('#turno').val() !=''){
               $.getJSON("{{url('/inscricao/candidato/idade')}}/"+ id , function(data) {
                   $.each(data, function(index, element) {
                       $("#divData").append('<label for="data">Data de Nascimento:</label><input type="date" required class="form-control" min="'+element.FX_ETARIA_INI+'"  max="'+element.FX_ETARIA_FIM+'" name="data">');
                   });
               });
               $('#dadosDoAluno').show(500);

           }
           else
               $('#dadosDoAluno').hide(500);
            $("#loading").modal('hide');
        });

        $("#cep").blur(function() {

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if(validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#rua").val("...");
                    $("#bairro").val("...");
                    $("#cidade").val("...");
                    $("#uf").val("...");
                    $("#ibge").val("...");

                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#rua").val(dados.logradouro);
                            $("#bairro").val(dados.bairro);
                            $("#cidade").val(dados.localidade);
                            $("#uf").val(dados.uf);
                            $("#ibge").val(dados.ibge);
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            alert("CEP não encontrado.");
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });

    </script>
@endsection()