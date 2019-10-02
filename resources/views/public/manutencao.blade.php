<!DOCTYPE html>
<html lang="en">
<head>
  <title>Inscrições 2020</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
<style>
    body{
        
        background-image: url('http://sia.abel.org.br/portal/img/fundo.jpg');
        background-size: cover;
        color: white;
        font-family: 'Roboto';
    }
.form-control{
    border-radius: 0px;
    padding: 15px;
}
.align{
    display: flex;
    align-items: center; //centraliza horizontalmente
    justify-content: center;
}
</style>
<body>
    <div class="container-fluid" style="background-color: #003c7f; padding: 10px;">
        <div class="container">
            <img src="images/logo.png" width="100px;" alt="">
        </div>
    </div>
<div class="container" >
    <div class="row" >
        <div class="col-sm-8 text-justify" style=" font-size: 18px;">
                <h1>Manutenção do sistema</h1>
                <br>
                <br>
          <p>Estimados responsáveis, saudações Lassalistas!</p>
          
          
          <p>
                Informamos que, devido à grande demanda de inscrições ocorridas no primeiro processo de admissão de novos alunos, estamos contabilizando as vagas remanescentes. 
          </p>
          <p>
                Por favor, informe seu contato que retornaremos em breve.
          </p>
      </div>
      <div class="col-sm-4" style="background-color: #003c7f; padding: 10px;">
          <h3>Preencha os campos para ser notificado.</h3>
            <script type='text/javascript' charset='iso-8859-1' src='//optin-static.akna.com.br/lib/integracaoForm/main.js'></script>
            
            <form id='lista-integracao-form' hash='2651358c' class='lista-integracao-form' onsubmit='return false;'>
                <div class="row">
                    <div class="col-sm-12">
                            <label class='fixedWidth'>Nome</label>
                            <input id='lista-integracao-nome' type='text' placeholder='digite seu nome' class="form-control">
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-sm-12">
                            <label class='fixedWidth'>Celular</label>
                            <input id='lista-integracao-telefone' type='text' placeholder='(99) 99999-9999' class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                            <label class='fixedWidth'>E-mail<span>*</span></label>
                            <input id='lista-integracao-email' type='text' class="form-control" placeholder='digite seu e-mail' >
                    </div>
                </div>                
                <br>
                
                <button onclick='onSubmitClick(this)' class="btn btn-danger">Enviar</button>
                <br><br>
                <div id='lista-integracao-sucessmsg' style="font-size: 18px;"></div>
      </div>
    
</div>

</body>
</html>

    
    