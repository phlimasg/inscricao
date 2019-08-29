<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class cadInteresseMail extends Mailable
{
    use Queueable, SerializesModels;

    public $form;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->form = $request->except('_token');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //dd($this->form['nome']);
        return $this->subject(ucwords($this->form['nome']).', estamos quase lá!')
        ->replyTo('atendimento.abel@lasalle.org.br')
        ->view('mail.cad_interesse');
    }
}
