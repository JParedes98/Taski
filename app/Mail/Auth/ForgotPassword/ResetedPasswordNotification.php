<?php

namespace App\Mail\Auth\ForgotPassword;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetedPasswordNotification extends Mailable
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
        return $this->view('mails.auth.ForgotPassword.reseted_password_notification')
            ->from(env('MAIL_FROM_ADDRESS', 'do-not-reply@esign.com'))
            ->subject('Contraseña Actualizada')
            ->with([
                'user'  => $this->user
            ]);
    }
}
