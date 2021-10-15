<?php

namespace App\Traits;

use Illuminate\Support\Facades\Mail;

trait AuthTrait
{
    /**
     * Send Email Verification
     */
    public function send_verification($user) {
        try {
            $token = auth()->tokenById($user->id);
            // PENDING CODE TO SEND EMAIL


            return true;
        } catch (\Exception $e) {
            return $e;
        }
    }
}
