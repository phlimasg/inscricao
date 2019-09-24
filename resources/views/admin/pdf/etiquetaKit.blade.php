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

    <td style="width: 8%; color: white" >
        <img src="{{asset('images/logoabel2018mono.png')}}" alt="" width="8%">
    </td>
    <td style="width: 25%;  color: black">
        <strong>{{strtoupper($a->CNOME)}}</strong> <br>
        <span style="font-size: 12px">
            {{$a->ESCOLARIDADE}} - {{$a->ANO}} <br> {{$a->TURNO}}
        </span><br>
        <span style="font-size: 12px">
            RESPONSÁVEL:{{strtoupper($a->FINNOME)}} <br>
        </span><br>
        
        <!--<b>CONTATO:</b> {{$a->FINTEL}}-->
    </td>

<!--
        </tr>
    </table>

