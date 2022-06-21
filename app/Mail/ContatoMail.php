<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


//use Illuminate\Contracts\Queue\ShouldQueue;

class ContatoMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Dados do form
     *
     * @var \stdClass
     */
    public $email_layout;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email_layout)
    {
        $this->email_layout = $email_layout;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.void');                    
    }
}
