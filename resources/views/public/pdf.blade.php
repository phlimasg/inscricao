<style>
    .container, #container, table, tr, td{
        font-family: tahoma;
        text-transform: uppercase;
    }
    .title{
        font-size: 18px;
    }
</style>
<div class="container" id="container">
    <table style="width: 100%">
        <tr>
            <td><img src="{{url('images/logo_pb.png')}}" alt="" width="150px"></td>
            <td align="right"> <b>Inscrição nº:</b> {{$insc->NINSC}} <br>{{$insc->ESCOLARIDADE}}<br>{{$insc->ANO}}<br>TURNO {{$insc->TURNO}}<br>
                Prova dia:  {{date('d/m/Y', strtotime($insc->DTPROVA))}}<br> as 8H</td>
        </tr>
    </table>
    <div align="center" class="title">
        <b>FICHA DE INSCRIÇÃO PARA INGRESSO {{date('Y')+1}}</b>
    </div>
    <br><hr><br>
<div class="title"><b>DADOS DO CANDIDATO</b></div>
    <table style="width: 100%">
        <tr>
            <td><b>nome:</b> {{$insc->CNOME}}</td>
            @if($insc->CEXALUNO == 0)
                <td align="right"> Ex-aluno? <b>NÃO</b></td>
            @else
                <td align="right"> Ex-aluno? <b>SIM</b></td>
            @endif
        </tr>
    </table>
    <table style="width: 100%">
        <tr>
            <td><b>ENDEREÇO: </b> {{$insc->CEND}} - {{$insc->CBAIRRO}} - {{$insc->CCIDADE}}/{{$insc->CESTADO}}</td>
        </tr>
        <tr>
            <td><b>DATA DE NASCIMENTO: </b> {{date('d/m/Y', strtotime($insc->CDTNASC))}}</td>
            <td><b>NAT.: </b> {{$insc->CNAT}}</td>
        </tr>
        <tr>
            <td><b>CEP: </b> {{$insc->CCEP}}</td>
            <td><b>TEL:</b> {{$insc->CTEL}}</td>
        </tr>
    </table>
    @if($insc->CNEC_ESP != null)
        <table style="width: 100%">
            <tr>
                <td><b>Portador de necessidades especiais:</b> <br>
                    {{$insc->CNEC_ESP}}
                </td>
            </tr>
        </table>
        *APRESENTAR LAUDO MÉDICO NO ATO DA MATRÍCULA
    @endif
    <br><br>
    <div class="title"><b>DADOS Da filiação</b></div>
    <table style="width: 100%">
        <tr>
            <td><b>NOME: </b> {{$insc->FIL1NOME}}</td>

        </tr>
        <tr>
            <td><b>data de nascimento:</b> <br>{{date('d/m/Y', strtotime($insc->FIL1DTNASC))}}</td>
            <td><b>naturalidade:</b><br>{{$insc->FIL1NATCID}}/{{$insc->FIL1NATEST}}</td>
        </tr>
    </table>
    <br>
    <table style="width: 100%">
        <tr>
            <td><b>NOME: </b> {{$insc->FIL2NOME}}</td>

        </tr>
        <tr>
            <td><b>data de nascimento:</b><br>{{date('d/m/Y', strtotime($insc->FIL2DTNASC))}}</td>
            <td><b>naturalidade:</b><br>{{$insc->FIL2NATCID}}/{{$insc->FIL2NATEST}}</td>
        </tr>
    </table>
    <br><br>
    <div class="title">
        <b>resp. acadêmico:</b>
    </div>
    <table style="width: 100%">
        <tr>
            <td><b>NOME: </b> {{$insc->ACADNOME}}</td>

        </tr>
        <tr>
            <td><b>data de nascimento:</b><br>{{date('d/m/Y', strtotime($insc->ACADNASC))}}</td>
            <td><b>naturalidade:</b><br>{{$insc->ACADCID}}/{{$insc->ACADEST}}</td>
        </tr>
        <tr>
            <td><b>TELEFONE:</b><br>{{$insc->ACADTEL}}</td>
            <td><b>EMAIL:</b><br>{{$insc->ACADEMAIL}}</td>
        </tr>
    </table>

    <div class="title">
        <b>resp. financeiro:</b>
    </div>
    <table style="width: 100%">
        <tr>
            <td><b>NOME: </b> {{$insc->FINNOME}}</td>
            <td><b>CPF:</b>{{$insc->CPF}}</td>
        </tr>
        <tr>
            <td><b>data de nascimento:</b><br>{{date('d/m/Y', strtotime($insc->FINDTNASC))}}</td>
            <td><b>naturalidade:</b><br>{{$insc->FINNATCID}}/{{$insc->FINNATEST}}</td>
        </tr>
        <tr>
            <td><b>TELEFONE:</b><br>{{$insc->FINTEL}}</td>
            <td><b>EMAIL:</b><br>{{$insc->FINMAIL}}</td>
        </tr>
    </table>

</div>

