<!--<style>
    body{
        font-family: Tahoma;
    }
    table {
        border-collapse: collapse;
    }
    tr {
        border-collapse: collapse;
        border: 1px solid black;
    }
</style>
    <table width="33,33%">
        <tr>-->
@if(strcasecmp('EDUCAÇÃO INFANTIL',$a->ESCOLARIDADE)==0)
            <td style="width: 8%; background-color: darkred; color: white" >
                <img src="{{asset('images/logoabel2018br.png')}}" alt="" width="8%">
            </td>
            <td style="border-right: 1px solid white;width: 25%; background-color: darkred; color: white">{{$a->ANO}} | {{$a->ESCOLARIDADE}}<br>
                <b>CANDIDATO:</b> <br> {{strtoupper($a->CNOME)}} <br>
                <b>RESPONSÁVEL:</b> <br> {{strtoupper($a->FINNOME)}} <br>
                <b>CONTATO:</b> {{$a->FINTEL}}
            </td>
@endif
@if(strcasecmp('ENSINO FUNDAMENTAL I',$a->ESCOLARIDADE)==0)
    <td style="width: 8%; background-color: #f1b107; color: white" >
        <img src="{{asset('images/logoabel2018mono.png')}}" alt="" width="8%">
    </td>
    <td style="border-right: 1px solid white;width: 25%; background-color: #f1b107; color: white">{{$a->ANO}} | {{$a->ESCOLARIDADE}}<br>
        <b>CANDIDATO:</b> <br> {{strtoupper($a->CNOME)}} <br>
        <b>RESPONSÁVEL:</b> <br> {{strtoupper($a->FINNOME)}} <br>
        <b>CONTATO:</b> {{$a->FINTEL}}
    </td>
@endif

@if(strcasecmp('ENSINO FUNDAMENTAL II',$a->ESCOLARIDADE)==0)
    <td style="width: 8%; background-color: #003c7f; color: white" >
        <img src="{{asset('images/logoabel2018br.png')}}" alt="" width="8%">
    </td>
    <td style="border-right: 1px solid white;width: 25%; background-color: #003c7f; color: white">{{$a->ANO}} | {{$a->ESCOLARIDADE}}<br>
        <b>CANDIDATO:</b> <br> {{strtoupper($a->CNOME)}} <br>
        <b>RESPONSÁVEL:</b> <br> {{strtoupper($a->FINNOME)}} <br>
        <b>CONTATO:</b> {{$a->FINTEL}}
    </td>
@endif
@if(strcasecmp('ENSINO MÉDIO',$a->ESCOLARIDADE)==0)
    <td style="width: 8%; background-color: #4e555b; color: white" >
        <img src="{{asset('images/logoabel2018br.png')}}" alt="" width="8%">
    </td>
    <td style="border-right: 1px solid white;width: 25%; background-color: #4e555b; color: white">{{$a->ANO}} | {{$a->ESCOLARIDADE}}<br>
        <b>CANDIDATO:</b> <br> {{strtoupper($a->CNOME)}} <br>
        <b>RESPONSÁVEL:</b> <br> {{strtoupper($a->FINNOME)}} <br>
        <b>CONTATO:</b> {{$a->FINTEL}}
    </td>
@endif
<!--
        </tr>
    </table>

