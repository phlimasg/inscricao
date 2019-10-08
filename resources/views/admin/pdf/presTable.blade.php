   @foreach($q as $a)
    <tr>
        <td>{{strtoupper($a->CNOME)}} - {{strtoupper($a->TURNO)}}@if ($a->INTEGRAL_ID != null) | COMPLEMENTAR @endif</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    @endforeach
</table>
<br>
OBS:<br><br>
<hr><br>
<hr><br>
<hr>
    Em, ___/____/____. <br><br><br>
    <div style="width: 20%" align="center">
        ____________________________ <br>
        Visto do Professor
    </div>