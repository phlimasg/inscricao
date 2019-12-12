@php($str_limit = 22)
@php($str_limit2 = 28)
@if(strcasecmp('EDUCAÇÃO INFANTIL',$a->ESCOLARIDADE)==0)
<td style=" width: 33%">
    <table style="width: 100%">
        <tr style="border-collapse: collapse; border: 1px solid silver;">
            
            <td style="border-right: 1px solid white; color: black; " >
                    <span style="font-size: 15px; ">{{mb_substr(mb_strtoupper($a->CNOME), 0, $str_limit)}}                                 
                        </span>
                    <br>
                    <span style="font-size: 12px;">{{$a->ANO}} - {{$a->TURNO}} - EI
                            <br><br>
                        </span>
                        <b style="font-size: 10px;">
                                RESPONSÁVEL
                        </b>
                        <span style="font-size: 12px;"> <br>
                            {{mb_substr(mb_strtoupper($a->FINNOME), 0, $str_limit2)}} <br>
                        </span>
                        <span style="font-size: 14px;"> 
                            {{$a->FINTEL}}
                        </span>
            </td>
               
        </tr>           
    </table>
</td>   
@endif


@if(strcasecmp('ENSINO FUNDAMENTAL I',$a->ESCOLARIDADE)==0)
<td style="width: 33%">
    <table style="width: 100%">
        <tr style="border-collapse: collapse; border: 1px solid silver;">
            
            <td style="border-right: 1px solid white; color: black; " >
                    <span style="font-size: 15px;">{{mb_substr(mb_strtoupper($a->CNOME), 0, $str_limit)}}                                
                        </span>
                    <br>
                    <span style="font-size: 12px;">{{$a->ANO}} - {{$a->TURNO}} - EFI
                            <br><br>
                        </span>
                        <b style="font-size: 10px;">
                                RESPONSÁVEL
                        </b>
                        <span style="font-size: 12px;"> <br>
                            {{mb_substr(mb_strtoupper($a->FINNOME), 0, $str_limit2)}} <br>
                        </span>
                        <span style="font-size: 14px;"> 
                            {{$a->FINTEL}}
                        </span>
            </td>
               
        </tr>           
    </table>
</td>   
@endif

@if(strcasecmp('ENSINO FUNDAMENTAL II',$a->ESCOLARIDADE)==0)
<td style="width: 33%">
    <table style="width: 100%">
        <tr style="border-collapse: collapse; border: 1px solid silver;">
            
            <td style="border-right: 1px solid white; color: black; " >
                    <span style="font-size: 15px;">{{mb_substr(mb_strtoupper($a->CNOME), 0, $str_limit)}}                                 
                        </span>
                    <br>
                    <span style="font-size: 12px;">{{$a->ANO}} - {{$a->TURNO}} - EFII
                            <br><br>
                        </span>
                        <b style="font-size: 10px;">
                                RESPONSÁVEL
                        </b>
                        <span style="font-size: 12px;"> <br>
                            {{mb_substr(mb_strtoupper($a->FINNOME), 0, $str_limit2)}} <br>
                        </span>
                        <span style="font-size: 14px;"> 
                            {{$a->FINTEL}}
                        </span>
            </td>
               
        </tr>           
    </table>
</td>   
@endif
@if(strcasecmp('ENSINO MÉDIO',$a->ESCOLARIDADE)==0)
<td style="width: 33%">
        <table style="width: 100%">
            <tr style="border-collapse: collapse; border: 1px solid silver;">
                
                <td style="border-right: 1px solid white; color: black; " >
                        <span style="font-size: 15px;">{{mb_substr(mb_strtoupper($a->CNOME), 0, $str_limit)}}                                 
                            </span>
                        <br>
                        <span style="font-size: 12px;">{{$a->ANO}} - {{$a->TURNO}} - EM
                                <br><br>
                            </span>
                            <b style="font-size: 10px;">
                                    RESPONSÁVEL
                            </b>                                
                            <span style="font-size: 12px;"> <br>
                                {{mb_substr(mb_strtoupper($a->FINNOME), 0, $str_limit2)}} <br>
                            </span>
                            <span style="font-size: 14px;"> 
                                {{$a->FINTEL}}
                            </span>
                </td>
                   
            </tr>           
        </table>
    </td>
@endif

