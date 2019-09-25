@if(strcasecmp('EDUCAÇÃO INFANTIL',$a->ESCOLARIDADE)==0)
    <td style="padding-right: 1%; width: 33%;">
        <table style="width: 100%">
            <tr style="border-collapse: collapse; border: 1px solid silver;">
                <td style="color: black; background-color: brown; width: 35px;height: 140px;" valign="top">
                    <img src="{{asset('images/logoabel2018fullbr.png')}}" alt="" style="width: 35px">
                </td>
                <td style="border-right: 1px solid white; color: black; " >
                        <span style="font-size: 20px;">
                            {{mb_strtoupper($a->CNOME)}}                                 
                            </span>
                        <br>
                        <span style="font-size: 15px;">{{$a->ANO}} - {{$a->TURNO}}
                                <br><br>
                            </span>
                            <b style="font-size: 10px;">
                                    RESPONSÁVEL
                            </b>
                                <br>
                            <span style="font-size: 15px;">
                                {{mb_strtoupper($a->FINNOME)}} <br>
                                {{$a->FINTEL}}
                            </span>
                </td>
                   
            </tr>           
        </table>
    </td>   
@endif


@if(strcasecmp('ENSINO FUNDAMENTAL I',$a->ESCOLARIDADE)==0)
<td style="padding-right: 1%; width: 33%">
        <table style="width: 100%">
            <tr style="border-collapse: collapse; border: 1px solid silver;">
                <td style="color: black; background-color: #e5bd27; width: 35px;height: 140px;" valign="top">
                    <img src="{{asset('images/logoabel2018fullbr.png')}}" alt="" style="width: 35px">
                </td>
                <td style="border-right: 1px solid white; color: black; " >
                        <span style="font-size: 20px;">{{mb_strtoupper($a->CNOME)}}                                 
                            </span>
                        <br>
                        <span style="font-size: 15px;">{{$a->ANO}} - {{$a->TURNO}}
                                <br><br>
                            </span>
                            <b style="font-size: 10px;">
                                    RESPONSÁVEL
                            </b>
                                <br>
                            <span style="font-size: 15px;">
                                {{mb_strtoupper($a->FINNOME)}} <br>
                                {{$a->FINTEL}}
                            </span>
                </td>
                   
            </tr>           
        </table>
    </td>
@endif

@if(strcasecmp('ENSINO FUNDAMENTAL II',$a->ESCOLARIDADE)==0)
<td style="padding-right: 1%; width: 33%">
        <table style="width: 100%">
            <tr style="border-collapse: collapse; border: 1px solid silver;">
                <td style="color: black; background-color: #114f9d; width: 35px;height: 140px;" valign="top">
                    <img src="{{asset('images/logoabel2018fullbr.png')}}" alt="" style="width: 35px">
                </td>
                <td style="border-right: 1px solid white; color: black; " >
                        <span style="font-size: 20px;">{{mb_strtoupper($a->CNOME)}}                                 
                            </span>
                        <br>
                        <span style="font-size: 15px;">{{$a->ANO}} - {{$a->TURNO}}
                                <br><br>
                            </span>
                            <b style="font-size: 10px;">
                                    RESPONSÁVEL
                            </b>
                                <br>
                            <span style="font-size: 15px;">
                                {{mb_strtoupper($a->FINNOME)}} <br>
                                {{$a->FINTEL}}
                            </span>
                </td>
                   
            </tr>           
        </table>
    </td>
@endif
@if(strcasecmp('ENSINO MÉDIO',$a->ESCOLARIDADE)==0)
<td style="padding-right: 1%; width: 33%">
        <table style="width: 100%">
            <tr style="border-collapse: collapse; border: 1px solid silver;">
                <td style="color: black; background-color: #666666; width: 35px;height: 140px;" valign="top">
                    <img src="{{asset('images/logoabel2018fullbr.png')}}" alt="" style="width: 35px">
                </td>
                <td style="border-right: 1px solid white; color: black; " >
                        <span style="font-size: 20px;">{{mb_strtoupper($a->CNOME)}}                                 
                            </span>
                        <br>
                        <span style="font-size: 15px;">{{$a->ANO}} - {{$a->TURNO}}
                                <br><br>
                            </span>
                            <b style="font-size: 10px;">
                                    RESPONSÁVEL
                            </b>
                                <br>
                            <span style="font-size: 15px;">
                                {{mb_strtoupper($a->FINNOME)}} <br>
                                {{$a->FINTEL}}
                            </span>
                </td>
                   
            </tr>           
        </table>
    </td>
@endif

