<style>
    body{
        font-family: Tahoma;
    }
    table {
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid black;
    }
</style>
<img src="{{asset('images/logo_pb.png')}}" alt="" width="150px">
<br>
<div align="center">
<h3>Ingresso {{date('Y')+1}} - {{$esc->ANO}} | {{$esc->ESCOLARIDADE}}</h3>
</div>

<table width="100%">
    <tr>
        <th width="45%">Candidato</th>
        <th>Presença</th>
        <th width="30%">Observações</th>
        <th>Resultado</th>
    </tr>