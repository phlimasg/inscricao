@extends('layouts.admin')
@section('content')
    @php($id = null) @php($graph = null) @php($count = 0)
    @foreach ($countDt as $d)
        @if($d->id != $id)
            @php($id = $d->id)
            @php($graph .= "['".date('d/m/Y',strtotime($d->DTPROVA))."'")
        @endif
        @php($graph .= ",".$d->QTD)
        @php($count ++)
        @if($count ==4)
            @php($graph .= "],")
            @php($count = 0)
        @endif
    @endforeach

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(drawChart2);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Pagamentos',      {{$qtdPg}}],
                ['inscrições efetuadas',     {{$inscCount}}]
            ]);

            var options = {
                title: 'Inscrições',
                is3D: true,

            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
        function drawChart2() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Falta Matricular',      {{$qtdPg - $countMat}}],
                ['Matriculados',     {{$countMat}}]
            ]);

            var options = {
                title: 'Matriculas',
                is3D: true,

            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

            chart.draw(data, options);
        }
    </script>
    <div class="container-fluid title">
        <h1>Relatório das Inscrições {{date('Y')+1}}</h1>
    </div>
    <div class="container-fluid"  style="background-color: white; color: #003c7f; font-size: 12px">
        <div class="row">
            <div class="col-sm-6">
                <div id="piechart" style="min-height: 300px;" class="img-fluid"></div>
            </div>
            <div class="col-sm-6">
                    <div id="piechart2" style="min-height: 300px;" class="img-fluid"></div>
                </div>
        </div>


    <div class="container-fluid" style="background-color: white; color: #003c7f; font-size: 12px">
        <div class="row" >
            <div class="col-sm-6">
            <b>Inscrições pagas por dia:</b>

            <ul class="nav nav-tabs">
                @foreach($dtprova as $d)
                    <li class=""><a data-toggle="tab" href="#{{$d->id}}">{{date('d/m/Y',strtotime($d->DTPROVA))}}</a></li>
                @endforeach
            </ul>
            <div class="tab-content">
                @foreach($dtprova as $d)
                    <div id="{{$d->id}}" class="tab-pane fade">
                        @foreach($countDt as $x)
                            @if($x->id == $d->id)
                            <div class="row">
                                <div class="col-sm-4">
                                    {{$x->ESCOLARIDADE}}
                                </div>
                                <div class="col-sm-2">
                                    {{$x->QTD}}
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                @endforeach
            </div>

        </div>

        <div class="col-sm-6">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Escolaridade</th>
                        <th>vagas disponíveis</th>
                        <th>Pagamentos efetuados</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pg as $d)
                        <tr>
                            <td>{{$d->ANO}} - {{$d->ESCOLARIDADE}} - {{$d->TURNO}}</td>
                            @if(($d->QTD_VAGAS - $d->QTD_INSCRITOS) < 4)
                                <td style="color: darkred"><b>{{$d->QTD_VAGAS - $d->QTD_INSCRITOS}}</b></td>
                            @else
                                <td>{{$d->QTD_VAGAS - $d->QTD_INSCRITOS}}</td>
                            @endif

                            <td>{{$d->QTD_INSCRITOS}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        </div>
        <br><br>
    </div>








@endsection()