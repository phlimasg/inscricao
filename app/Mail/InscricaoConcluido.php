<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Model\inscricaoView;

class InscricaoConcluido extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $c;
    public function __construct(inscricaoView $c)
    {
        $this->c = $c;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {        
        //return $this->view('mail.concluido',compact('c'));
        //$c = $incricao;
        return $this->subject(ucwords($this->c->FINNOME).', estamos quase lá!')
        ->replyTo('atendimento.abel@lasalle.org.br')
        ->view('mail.concluido');
    }
}
