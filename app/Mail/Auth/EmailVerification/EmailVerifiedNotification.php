<?php

namespace App\Mail\Auth\EmailVerification;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailVerifiedNotification extends Mailable
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
    public function build()
    {
        return $this->view('mails.auth.EmailVerification.email_verified_notification')
            ->from(env('MAIL_FROM_ADDRESS', 'do-not-reply@esign.com'))
            ->subject('Cuenta Esign Verificada Exitosamente')
            ->with([
                'user'  => $this->user
            ]);
    }
}
