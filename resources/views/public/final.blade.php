@extends('layouts.layout')
@section('content')
    <div class="container-fluid title">
        <h1>Dados salvos com sucesso!</h1>
    </div>
    <div class="container-fluid form ">
        <div class="container text-justify">
           <div class="row">
               <div class="col-sm-12">
                   Prezado(a) {{$c->FINNOME}}, <br><br>
                   Confirmamos os dados para a inscrição do aluno(a) {{$c->CNOME}}.<br>
                   <div style="color: #003c7f; background: white; padding: 15px">                       
                    A AVALIAÇÃO DIAGNÓSTICA PARA 2021 SERÁ REALIZADA DE FORMA DIFERENTE DOS ANOS ANTERIORES, POR ISSO, FIQUE ATENTO(A) ÀS ETAPAS DO PROCESSO:
                    <br>
                    <ul>
                        <li>RESERVA DE VAGA COM O PAGAMENTO DA TAXA - R$50,00
                        </li>
                        <li>
                            AVALIAÇÃO DOS DOCUMENTOS ENVIADOS NO MOMENTO DA INSCRIÇÃO
                        </li>
                        <li>
                            ENVIO DO KIT DE MATRÍCULA PARA O ENDEREÇO CADASTRADO NO FORMULÁRIO                            
                        </li>
                        <li>
                            REUNIÃO ONLINE COM A COORDENAÇÃO PEDAGÓGICA                            
                        </li>
                        <li>
                            MATRÍCULA E ENTREGA DE DOCUMENTOS PRESENCIAL(AGENDADA), CONFORME CALENDÁRIO. 
                        </li>
                    </ul>

                       A reunião ocorrerá no dia @if($c->DTPROVA=="2020-06-07")agendado na secretaria @else{{date('d/m/Y', strtotime($c->DTPROVA))}} AS {{$c->HORAPROVA}}@endif.                       
                   </div>
<!--
                   <div>
                       <a href="https://docs.google.com/document/d/1HPhT47NzE-zN587-d30yS-3uod2Dth2C33lscVh-Wms/edit?usp=sharing" target="_blank">
                           <button class="btn btn-danger btn-login">ACESSE O CONTEÚDO DAS AVALIAÇÕES</button>
                       </a>
                   </div>
                   <br>
                -->

                <br>                   
                   <p><b>ENVIO DO KIT DE MATRÍCULA </b></p>
                   <p>O KIT DE MATRÍCULAS, QUE CONTÉM  OS DOCUMENTOS NECESSÁRIOS PARA O INGRESSO, SERÁ ENVIADO AO ENDEREÇO CADASTRADO NO MOMENTO DO PREENCHIMENTO DA FICHA, NA SEMANA DA REUNIÃO COM A COORDENAÇÃO PEDAGÓGICA.</p>
                   <br>
                   <p><b>REUNIÃO COM A COORDENAÇÃO PEDAGÓGICA</b></p>
                   <p>A REUNIÃO COM A COORDENAÇÃO PEDAGÓGICA SERÁ VIRTUAL, O LINK DE ACESSO SERÁ ENVIADO PARA AS FAMÍLIAS NOS DIAS QUE ANTECEDEM O ENCONTRO. NA DATA E HORÁRIO MARCADOS APRESENTAREMOS A PROPOSTA PEDAGÓGICA DA ESCOLA E DO SEGMENTO, ALÉM DE INFORMAR A DATA EM QUE OS FORMULÁRIOS ESTARÃO DISPONÍVEIS PARA A MATRÍCULA.</p>
                   <br>
                   <p><b>MATRÍCULA PRESENCIAL </b></p>
                   <p>A MATRÍCULA SERÁ PRESENCIAL AGENDADA. OS FORMULÁRIOS DEVEM SER PREENCHIDOS ANTECIPADAMENTE E ANEXADOS AOS DOCUMENTOS NECESSÁRIOS PARA A MATRÍCULA, QUE SEGUEM ABAIXO:</p>
                   <br>
                   <p>* FORMULÁRIOS E CONTRATOS PREENCHIDOS E ASSINADOS;</p>
                   <p>* FOTOCÓPIA DA CERTIDÃO DE NASCIMENTO DO CANDIDATO;</p>
                   
                   <p>* FOTOCÓPIA DO CPF DO CANDIDATO (PARA CONTRATAÇÃO DO SEGURO ESCOLAR);</p>
                   
                   <p>* COMPROVANTE DO TIPO SANGUÍNEO DO CANDIDATO – EXAME OU ATESTADO MÉDICO (LEI MUNICIPAL Nº 3348 DE 28/06/2018);</p>
                   
                   <p>* ATESTADO MÉDICO COM A LIBERAÇÃO PARA A PRÁTICA DE ATIVIDADES FÍSICAS NA DISCIPLINA DE EDUCAÇÃO FÍSICA (LEI ESTADUAL Nº 6545 DE 2/10/2013);</p>
                   
                   <p>* DECLARAÇÃO DE QUITAÇÃO FINANCEIRA DA ESCOLA DE ORIGEM;</p>
                   
                   <p>* FOTOCÓPIA DO RG E CPF DO RESPONSÁVEL FINANCEIRO;</p>
                   
                   <p>* FOTOCÓPIA DO COMPROVANTE DE RESIDÊNCIA DO RESPONSÁVEL FINANCEIRO;</p>
                   
                   <p>* FOTOCÓPIA DO TERMO DE GUARDA JUDICIAL, SE FOR O CASO;</p>
                   
                   <p>* PAGAMENTO DA 1ª PARCELA DA ANUIDADE DE 2021.</p>
                   <br>
                   <p>O PAGAMENTO DA PRIMEIRA PARCELA DA ANUIDADE SERÁ REALIZADO NO MOMENTO DA MATRÍCULA E PODE SER EFETUADO EM DINHEIRO OU DÉBITO.</p>
                   <br>                   
                   <p>LOCAL: R. MARIO ALVES, 2 - ICARAÍ</p>                   
                   <br>
                   <b>ATENÇÃO:</b>
                   1. APRESENTAÇÃO DO RESULTADO FINAL DO CANDIDATO (BOLETIM OU DECLARAÇÃO ATÉ O DIA 21 DE DEZEMBRO), CASO CONTRÁRIO O ALUNO NÃO SERÁ ENTURMADO. <br>
                   2. ESCLARECEMOS QUE, DE ACORDO COM A LEGISLAÇÃO VIGENTE, A MATRÍCULA SERÁ EFETIVADA APÓS A ENTREGA DA TRANSFERÊNCIA (HISTÓRICO ESCOLAR ORIGINAL).<br>
                   3. A VAGA SÓ PERMANECERÁ RESERVADA ATÉ O ÚLTIMO DIA DE MATRÍCULA DO PERÍODO CORRESPONDENTE, INFORMADO NO FORMULÁRIO ENTREGUE JUNTO DO KIT DE MATRÍCULAS. CASO A DATA SEJA PERDIDA, A VAGA VOLTA PARA A CONCORRÊNCIA ABERTA. POR ISSO, FIQUE ATENTO(A) AOS PRAZOS.<br>
                   <br>                   
                   <p><b>TURNO COMPLEMENTAR</b></p>
                   
                   <p>AS TURMAS DO TURNO COMPLEMENTAR SERÃO FORMADAS CASO ATINJAM O NÚMERO MÍNIMO DE ALUNOS MATRICULADOS POR ANO DE ESCOLARIDADE.</p>
                   <br>
                   <p><b>AGENDAMENTO DE VISITAS</b></p>
                   <p>ESTAMOS COM A NOSSA AGENDA DE VISITAS ABERTA, SEGUINDO AS NORMAS DE SAÚDE DOS ÓRGÃOS COMPETENTES. CASO TENHA INTERESSE EM REALIZAR UMA VISITA AO COLÉGIO PARA CONHECER AS INSTALAÇÕES, ENVIE UM EMAIL PARA ATENDIMENTO.ABEL@LASALLE.ORG.BR E AGENDE.</p>
                   <br>                   
                   <p><b>IMPORTANTE: </b></p>
                   <p>A AVALIAÇÃO SERÁ REALIZADA COM BASE NOS DOCUMENTOS ENVIADOS, POR ISSO, ENCAMINHE TODOS OS DOCUMENTOS NECESSÁRIOS, POIS, SEM ELES, NÃO PODEREMOS AGENDAR A REALIZAÇÃO DA ETAPA SEGUINTE. CASO TENHA DEIXADO DE ENVIAR ALGUM DOCUMENTO, ENVIE POR EMAIL PARA ATENDIMENTO.ABEL@LASALLE.ORG.BR E CONCLUA A INSCRIÇÃO. OS CANDIDATOS QUE NECESSITAREM DE ATENDIMENTO EDUCACIONAL ESPECIALIZADO REALIZAÇÃO UMA ENTREVISTA VIRTUAL COM A COORDENAÇÃO DO SEGMENTO OU COM EQUIPE DE ATENDIMENTO EDUCACIONAL ESPECIALIZADO.</p>
                   <br>
                   <p>EM CASO DE DÚVIDAS, ENVIE UM EMAIL PARA ATENDIMENTO.ABEL@LASALLE.ORG.BR</p>
                   
                   <br>
                   <p>SEJAM BEM-VINDOS AO COLÉGIO LA SALLE ABEL!</p>
                   <p>VIVA JESUS EM NOSSOS CORAÇÕES, PARA SEMPRE!</p>










                   <br>
                   <!--Clique <a href="{{url('/painel/'.$c->CPF)}}">aqui</a> para maiores informações. <br> <br> -->

               </div>
           </div>
            <div class="row">
                <a href="{{url('inscricao/'.$c->CPF.'/respacad')}}">
                    <button type="button" class="btn btn-lg btn-danger btn-login">NOVO CANDIDATO</button>
                </a>
            </div>
            <div class="row">
                <a href="{{url('/')}}">
                    <button type="button" class="btn btn-lg btn-success btn-login">FINALIZAR</button>
                </a>
            </div>
        </div>
    </div>
@endsection()