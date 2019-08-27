<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table width="100%" class="ak-container" align="center" cellpadding="0" cellspacing="0" style="background-color: #E7E7E7; width: 100%;"><tbody><tr><td>
    <table width="600" class="ak-content" cellpadding="0" cellspacing="0" align="center" style="background-color: #FFFFFF; margin: auto;"><tbody><tr><td><table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-top: 0px; margin-bottom: 0px; background-color: #00468A;"><tbody><tr><td valign="top" style="color: #4A423C; font-family: arial, helvetica, sans-serif; font-size: 18px; padding: 20px 10px;">        <table align="left" border="0" cellpadding="0" cellspacing="0" width="27%" class="ak-column-container"><tbody><tr><td align="center" valign="top" style="color: #4A423C; font-family: arial, helvetica, sans-serif; font-size: 0px; text-align: center;">                    <img ak:edit="image" src="http://spaces.setdata.com.br/emkt/dados/22330/47087/Image/2019/extraclasse/logo.png" style="border: 0px none; width: 100px; max-width: 100px;" width="100" alt=""></td>            </tr></tbody></table><table align="right" border="0" cellpadding="0" cellspacing="0" width="68%" class="ak-column-container"><tbody><tr><td ak:edit="text" valign="top" style="color: #4A423C; font-family: arial, helvetica, sans-serif; font-size: 18px; text-align: left;"><div style="text-align: justify; border-left: solid ; border-left-color: #F6C400; padding-left: 10px; text-transform: uppercase;">&nbsp;</div>
    
    <div style="border-left: solid #F6C400; padding-left: 10px; text-transform: uppercase;"><br><strong><font color="#ffffff"><span style="font-size: 22px;">Inscrições 2020</span></font></strong><br><br>
    &nbsp;</div>
    </td>            </tr></tbody></table></td></tr></tbody></table>
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-top: 0px; margin-bottom: 0px;">
        <tbody><tr><td style="color: #4A423C; font-family: arial, helvetica, sans-serif; font-size: 18px; padding-right: 20px; padding-left: 20px; padding-top: 20px;">
        
            <div class="col-sm-12">
                Prezado(a) {{$c->FINNOME}}, <br><br>
                Confirmamos os dados para a inscrição do aluno(a) {{$c->CNOME}}.<br>
                <div style="color: #003c7f; background: white; text-align: justify;">

                    Lembramos que o prazo para pagamento da taxa no valor de <b>R$50,00</b> para a Avaliação Diagnóstica se encerra na quinta-feira <b>{{date('d/m/Y',strtotime('-2 days', strtotime($c->DTPROVA)))}}</b>.
                    <br>
                    A Avaliação ocorrerá no dia <b>{{date('d/m/Y', strtotime($c->DTPROVA))}}</b>, às <b>08:00</b> horas.
                    O pagamento deve ser feito na Tesouraria do Colégio. <br>
                    <b>As vagas são limitadas.</b>
                    <br>
                    A demora no pagamento poderá acarretar na perda da vaga, pois este confirma a inscrição dentro do número de vagas disponíveis.
                </div>

                <div>
                    <a href="https://docs.google.com/document/d/1HPhT47NzE-zN587-d30yS-3uod2Dth2C33lscVh-Wms/edit?usp=sharing" target="_blank">
                        <button style="width: 100%; padding: 15px; background-color: brown; color: white">CLIQUE AQUI E ACESSE O CONTEÚDO DAS AVALIAÇÕES</button>
                    </a>
                </div>
                
                <style>
                    .container, #container, table, tr, td{
                        font-family: tahoma;
                        text-transform: uppercase;
                    }
                    .title{
                        font-size: 18px;
                    }
                </style>
                <hr>
                <div class="container" id="container" style="text-transform: uppercase;">
                    <table style="width: 100%">
                        <tr>
                            <td></td>
                            <td align="right"> 
                                <b>Inscrição nº:</b> {{$c->NINSC}} <br>
                                <b>Prova dia: <br> {{date('d/m/Y', strtotime($c->DTPROVA))}} às 8h</b><br>
                                {{$c->ESCOLARIDADE}} - {{$c->ANO}} - TURNO {{$c->TURNO}}<br>
                            </td>
                        </tr>
                    </table>
                    <hr>
                <div class="title"><b>DADOS DO CANDIDATO</b></div>
                    <table style="width: 100%">
                        <tr>
                            <td><b>NOME:</b> <br> {{$c->CNOME}}</td>
                            @if($c->CEXALUNO == 0)
                                <td align="right"> Ex-aluno? <br><b>NÃO</b></td>
                            @else
                                <td align="right"> Ex-aluno? <br><b>SIM</b></td>
                            @endif
                        </tr>
                    </table>
                    <table style="width: 100%">
                        <tr>
                            <td><b>ENDEREÇO: <br></b> {{$c->CEND}} <br> {{$c->CBAIRRO}} - {{$c->CCIDADE}}/{{$c->CESTADO}}</td>
                        </tr>
                        <tr>
                            <td><b>DT. NASC.: <br></b> {{date('d/m/Y', strtotime($c->CDTNASC))}}</td>
                            <td><b>NAT.: <br></b> {{$c->CNAT}}</td>
                        </tr>
                        <tr>
                            <td><b>CEP: </b><br> {{$c->CCEP}}</td>
                            <td><b>TEL:</b><br> {{$c->CTEL}}</td>
                        </tr>
                    </table>
                    @if($c->CNEC_ESP != null)
                        <table style="width: 100%">
                            <tr>
                                <td><b>Portador de necessidades especiais:</b> <br>
                                    {{$c->CNEC_ESP}}
                                </td>
                            </tr>
                        </table>
                        *APRESENTAR LAUDO MÉDICO NO ATO DA MATRÍCULA
                    @endif
                    <br><br>
                    <div class="title"><b>DADOS Da filiação</b></div>
                    <table style="width: 100%">
                        <tr>
                            <td><b>NOME: </b><br> {{$c->FIL1NOME}}</td>
                
                        </tr>
                        <tr>
                            <td><b>data de nascimento:</b> <br>{{date('d/m/Y', strtotime($c->FIL1DTNASC))}}</td>
                            <td><b>naturalidade:</b><br>{{$c->FIL1NATCID}}/{{$c->FIL1NATEST}}</td>
                        </tr>
                    </table>
                    <br>
                    <table style="width: 100%">
                        <tr>
                            <td><b>NOME: </b><br> {{$c->FIL2NOME}}</td>
                
                        </tr>
                        <tr>
                            <td><b>data de nascimento:</b><br>{{date('d/m/Y', strtotime($c->FIL2DTNASC))}}</td>
                            <td><b>naturalidade:</b><br>{{$c->FIL2NATCID}}/{{$c->FIL2NATEST}}</td>
                        </tr>
                    </table>
                    <br><br>
                    <div class="title">
                        <b>resp. acadêmico:</b>
                    </div>
                    <table style="width: 100%">
                        <tr>
                            <td><b>NOME: </b> <br>{{$c->ACADNOME}}</td>
                
                        </tr>
                        <tr>
                            <td><b>data de nascimento:</b><br>{{date('d/m/Y', strtotime($c->ACADNASC))}}</td>
                            <td><b>naturalidade:</b><br>{{$c->ACADCID}}/{{$c->ACADEST}}</td>
                        </tr>
                        <tr>
                            <td><b>TELEFONE:</b><br>{{$c->ACADTEL}}</td>
                            <td><b>EMAIL:</b><br>{{$c->ACADEMAIL}}</td>
                        </tr>
                    </table>
                    <br>
                    <div class="title">
                        <b>resp. financeiro:</b>
                    </div>
                    <table style="width: 100%">
                        <tr>
                            <td><b>NOME: </b> <br>{{$c->FINNOME}}</td>
                            <td><b>CPF:</b><br>{{$c->CPF}}</td>
                        </tr>
                        <tr>
                            <td><b>data de nascimento:</b><br>{{date('d/m/Y', strtotime($c->FINDTNASC))}}</td>
                            <td><b>naturalidade:</b><br>{{$c->FINNATCID}}/{{$c->FINNATEST}}</td>
                        </tr>
                        <tr>
                            <td><b>TELEFONE:</b><br>{{$c->FINTEL}}</td>
                            <td><b>EMAIL:</b><br>{{$c->FINMAIL}}</td>
                        </tr>
                    </table>
                
                </div>
                <hr>

                <br>
                <b>Local:</b> Av. Roberto Silveira, 29 – Icaraí.<br><br>
                <b>Trazer para a avaliação:</b>
                <br>
                Educação Infantil: Utilizaremos material próprio da escola. <br>
                Ensino Fundamental I: Estojo com caneta, lápis, borracha e lápis de cor.<br>
                Ensino Fundamental II e Médio: Estojo com caneta, lápis e borracha.<br>
               <br>

                Na ocasião, a coordenação pedagógica  se reunirá com os responsáveis para apresentação da proposta pedagógica da escola e informaremos a data em que os formulários estarão disponíveis para a matrícula.<br><br>

                <b>Os documentos necessários para a matrícula:</b> <br> <br>

                * Formulários e contratos preenchidos e assinados;<br>
                * Fotocópia da certidão de nascimento do candidato;<br>
                * Fotocópia do CPF do candidato (para contratação do Seguro Escolar);<br>
                * Comprovante do Tipo sanguíneo do candidato – Exame ou Atestado Médico (Lei municipal nº 3348 de 28/06/2018);<br>
                * Atestado Médico com a liberação para a prática de atividades físicas na disciplina de Educação Física (Lei Estadual nº 6545 de 2/10/2013);<br>
                * Declaração de quitação financeira da escola de origem;<br>
                * Fotocópia do RG e CPF do responsável financeiro;<br>
                * Fotocópia do comprovante de residência do responsável financeiro;<br>
                * Fotocópia do Termo de Guarda Judicial, se for o caso;<br>
                * Comprovante de pagamento da 1ª parcela da anuidade de {{date('Y')+1}}.<br><br>

                <b>Atenção:</b><br>
                1. Apresentação do resultado final do candidato (Boletim ou Declaração até o dia 21 de dezembro), caso contrário o aluno não será enturmado.<br>
                2. Esclarecemos que, de acordo com a legislação vigente, a matrícula será efetivada após a entrega da transferência (Histórico Escolar original).<br>
                <br>
                <!--Clique <a href="{{url('/painel/'.$c->CPF)}}">aqui</a> para maiores informações. <br> <br> -->

            </div>              
        

    </td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-top: 0px; margin-bottom: 0px;"><tbody><tr><td style="color: #4A423C; font-family: arial, helvetica, sans-serif; font-size: 18px; padding: 20px;"><div style="text-align: right;">   
    
    
    
    
    </div>
    </td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-top: 0px; margin-bottom: 0px; background-color: #014492;"><tbody><tr><td style="color: #4A423C; font-family: arial, helvetica, sans-serif; font-size: 18px; padding: 40px 20px;"><div style="width: 50%; float: left; text-align: center;"><img alt="" src="http://dev2-new.abel.org.br/imagens/bot_logo.png" style="border: 0px none; width: 300px; height: 62px;" width="300"></div>
    
    <div style="text-align: center;"><span style="color:#ffffff;"><strong>Central de Atendimento</strong><br>
    0800 007 9800</span><br><strong><a href="http://lasalle.edu.br/abel" title="Sem título 1" style="color: #0000FF;"><span style="color:#daa520;">lasalle.edu.br/abel</span></a></strong></div>
    </td></tr></tbody></table><table style="padding: 0px 20px; margin-top: 0px; background: #E0B726;" id="rd-component" data-new="true" height="85px" width="100%"><tbody><tr id="top-spacing"><td height="0px" style="color: #4A423C; font-family: arial, helvetica, sans-serif; font-size: 18px;"></td></tr><tr><td style="color: #4A423C; font-family: arial, helvetica, sans-serif; font-size: 18px;"><table id="table-title" align="right"><tbody><tr align="right" style="padding: 10px 0 5px;"><td style="color: #4A423C; font-family: arial, helvetica, sans-serif; font-size: 18px; padding: 0 10px 0;" height="40"><span style="font-size: 14px; overflow-wrap: break-word; color: #FFFFFF; font-family: tahoma, geneva, sans-serif;" id="titleRd">Acompanhe nossas Redes Socias.</span></td></tr></tbody></table></td></tr><tr><td style="color: #4A423C; font-family: arial, helvetica, sans-serif; font-size: 18px;"><table align="right" id="table-icons" style="min-width: inherit !important; max-width: inherit !important; width: inherit !important;"><colgroup><col style="width: inherit !important;" width="55"></colgroup><tbody><tr style="padding: 10px 0; text-align: center;" id="td-rd"><td align="left" valign="top" class="rede-social" id="facebook-rd-table" width="55" style="color: #4A423C; font-family: arial, helvetica, sans-serif; font-size: 18px;">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" style="padding: 10px;"><tbody><tr><td align="right" valign="middle" class="rede-social-td" width="35" style="color: #4A423C; font-family: arial, helvetica, sans-serif; font-size: 0px;">
                                    <a href="http://www.facebook.com/lasalleabel" target="_blank" class="rede-social-a" title="facebook" style="color: #0000FF;">
                                        <img src="http://spaces.setdata.com.br/emkt/dados/social_network_icons/quadrados_coloridos/Facebook.png" class="rede-social-img" width="35" alt="" style="border: 0px none;"></a>
                                </td>
                            </tr></tbody></table></td><td align="left" valign="top" class="rede-social" id="instagram-rd-table" width="55" style="color: #4A423C; font-family: arial, helvetica, sans-serif; font-size: 18px;">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" style="padding: 10px;"><tbody><tr><td align="right" valign="middle" class="rede-social-td" width="35" style="color: #4A423C; font-family: arial, helvetica, sans-serif; font-size: 0px;">
                                    <a href="http://www.instagram.com/la.salle.abel" target="_blank" class="rede-social-a" title="instagram" style="color: #0000FF;">
                                        <img src="http://spaces.setdata.com.br/emkt/dados/social_network_icons/quadrados_coloridos/Instagram.png" class="rede-social-img" width="35" alt="" style="border: 0px none;"></a>
                                </td>
                            </tr></tbody></table></td><td align="left" valign="top" class="rede-social" id="youtube-rd-table" width="55" style="color: #4A423C; font-family: arial, helvetica, sans-serif; font-size: 18px;">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" style="padding: 10px;"><tbody><tr><td align="right" valign="middle" class="rede-social-td" width="35" style="color: #4A423C; font-family: arial, helvetica, sans-serif; font-size: 0px;">
                                    <a href="http://www.youtube.com/lasalleabeloficial" target="_blank" class="rede-social-a" title="youtube" style="color: #0000FF;">
                                        <img src="http://spaces.setdata.com.br/emkt/dados/social_network_icons/quadrados_coloridos/Youtube.png" class="rede-social-img" width="35" alt="" style="border: 0px none;"></a>
                                </td>
                            </tr></tbody></table></td></tr></tbody></table></td></tr><tr id="bottom-spacing"><td height="0px" style="color: #4A423C; font-family: arial, helvetica, sans-serif; font-size: 18px;"></td></tr></tbody></table></td>
    </tr></tbody></table></td>
    </tr></tbody></table></body>
</html>