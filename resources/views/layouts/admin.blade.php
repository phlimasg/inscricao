<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Inscrições {{date("Y")+1}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.js"></script>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
</head>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" style="margin-top: -10px" href="#"><img width="90" src="{{asset('images/logo.png')}}" alt=""></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{url('/home')}}">Home</a></li>
                <li><a href="{{url('/home/secretaria')}}">Secretaria</a></li>
                <li><a href="{{url('/home/pagamento')}}">Tesouraria</a></li>
                <li><a href="{{url('/home/central')}}">Central de Atendimento</a></li>
                <li><a href="{{url('/home/config')}}"> <span class="glyphicon glyphicon-cog"></span></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">                
                <li><a href="{{'/logoff'}}"><span class="glyphicon glyphicon-off"></span></a></li>
              </ul>
        </div>        
    </div>
</nav>

@yield('content')

<footer class="container-fluid text-center">
    <p>Inscrições {{date('Y')+1}} - La Salle Abel</p>
</footer>


</body>
</html>
