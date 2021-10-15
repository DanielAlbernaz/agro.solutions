<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use stdClass;

class newLaravelTips extends Mailable
{
    use Queueable, SerializesModels;

    private $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\stdClass $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $this->subject('Formulário de contato!');

        $this->to($this->user->email, $this->user->nome);

        return $this->markdown('mail.newLaravelTips', [
            'user' => $this->user
        ]);
        // return $this->markdown('mail.imoveis', [
        //     'user' => $this->user
        // ]);
    }
}
