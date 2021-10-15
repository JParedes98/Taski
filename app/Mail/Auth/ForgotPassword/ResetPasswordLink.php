<?php

namespace App\Mail\Auth\ForgotPassword;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordLink extends Mailable
{
    use Queueable, SerializesModels;
    public $token, $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token, $user)
    {
        $this->token = $token;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.auth.ForgotPassword.reset_password_link')
            ->from(env('MAIL_FROM_ADDRESS', 'do-not-reply@esign.com'))
            ->subject('Solicitud de Cambio de Contraseña')
            ->with([
                'token' => $this->token,
                'user'  => $this->user
            ]);
    }
}
