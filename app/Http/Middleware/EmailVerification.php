<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailVerification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if(!$user) {
            return response()->json([
                'message' => 'User not found'
            ], 200);
        }

        if(!$user->email_verified_at) {

            $token = auth()->tokenById($user->id);
            // Mail::to($user->email)->send(new AccountConfirmation($token, $user));

            return response()->json([
                'message' => 'Please verify your email. Check your email inbox, we just sent you an email confirmation.'
            ], 401);
        }

        return $next($request);
    }
}
