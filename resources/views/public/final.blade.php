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
                           <button class="btn btn-danger btn-login">ACESSE O CONTEÚDO DAS AVALIAÇÕES</button>
                       </a>
                   </div>
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
           </div>
            <div class="row">
                <a href="{{url('inscricao/'.$c->CPF.'/respacad')}}">
                    <button type="button" class="btn btn-lg btn-danger btn-login">NOVO CANDIDATO</button>
                </a>
            </div>
            <div class="row">
                <a href="{{url('/')}}">
                    <button type="button" class="btn btn-lg btn-primary btn-login">FINALIZAR</button>
                </a>
            </div>
        </div>
    </div>
@endsection()