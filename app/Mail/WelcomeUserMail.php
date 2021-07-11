<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): self
    {
        $verifyUrl = '';

        return $this
        ->subject('Регистрация учетной записи '. setting('site.title'))
        ->view('emails.create.welcome_user', [
            'user' => $this->user,
            'url' => $verifyUrl,
        ]);
    }
}
