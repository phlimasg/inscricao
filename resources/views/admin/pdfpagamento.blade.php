<style>
    .container, #container, table, tr, td{
        font-family: tahoma;
    }
    .title{
        font-size: 18px;
    }
</style>
<div class="container" id="container">
    <img src="{{url('images/logo_pb.png')}}" alt="" width="150px">
<div align="center" class="title">
    CONFIRMAÇÃO DE PAGAMENTO/INSCRIÇÃO
</div>
    <br>
    <hr>
Confirmo o pagamento e a inscrição de <b style="text-transform: uppercase">{{$insc->CNOME}}</b> candidato à/ao {{$insc->ANO}} do/da {{$insc->ESCOLARIDADE}}.<br>
    Data da prova:  {{date('d/m/Y', strtotime($insc->DTPROVA))}} - 8H<br>
    Local: Av. Roberto Silveira, 29 - Icaraí - Niterói/RJ
    <div align="right">
        Niterói, {{date('d/m/Y')}}<br><br>
        ________________________________<br>
        Funcionário
    </div>
    <b>Trazer: </b><br>
    Ensino Fundamental - Caneta, lápis, borracha e lápis de cor. <br>
    Ensino Médio - Caneta, lápis, borracha e carteira de identidade. <br>
</div>
<br><br><br><br>
<div style="border-bottom: 2px dashed black; width: 100%"><br></div>
<br>
<div class="container" id="container">
    <img src="{{url('images/logo_pb.png')}}" alt="" width="150px">
    <div align="center" class="title">
        CONFIRMAÇÃO DE PAGAMENTO/INSCRIÇÃO
    </div>
    <br>
    <hr>
    Confirmo o pagamento e a inscrição de <b style="text-transform: uppercase">{{$insc->CNOME}}</b> candidato à/ao {{$insc->ANO}} do/da {{$insc->ESCOLARIDADE}}.<br>
    Data da prova:  {{date('d/m/Y', strtotime($insc->DTPROVA))}} - 8H<br>
    Local: Av. Roberto Silveira, 29 - Icaraí - Niterói/RJ
    <div align="right">
        Niterói, {{date('d/m/Y')}}<br><br>
        ________________________________<br>
        Funcionário
    </div>
    <b>Trazer: </b><br>
    Ensino Fundamental - Caneta, lápis, borracha e lápis de cor. <br>
    Ensino Médio - Caneta, lápis, borracha e carteira de identidade. <br>
</div>