<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Mail;
use Validator;
use Carbon\Carbon;
use App\Models\User;
use App\Traits\AuthTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\Auth\ForgotPassword\ResetPasswordLink;
use App\Mail\Auth\ForgotPassword\ResetedPasswordNotification;
use App\Mail\Auth\EmailVerification\EmailVerifiedNotification;

class AuthController extends Controller
{
    use AuthTrait;

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct() {}

    /**
     * Login and response back with JWT via given credentials.
    */
    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email'         => 'required|string|email|max:255',
            'password'      => 'required|string|min:8',
        ]);

        if($validator->fails()) {
            return $this->response_validator_errors($validator->messages());
        }

        try {

            $credentials = request(['email', 'password']);
            $token = auth()->attempt($credentials);

            if (!$token) {
                return response()->json(['message' => 'Email or Password Incorrect'], 401);
            }

            return response()->json([
                'access_token'  => $token,
                'token_type'    => 'bearer',
                'expires_in'    => Carbon::now()->addHours(1),
                'user'          => auth()->user()
            ], 200);

        } catch (\Exception $e) {
            return $this->log_exception($e);
        }
    }

    /**
     * Register new User and Get its JWT.
    */
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'given_name'    => 'required|string|max:255',
            'family_name'   => 'required|string|max:255',
            'email'         => 'required|string|email|max:255|unique:users',
            'password'      => 'required|string|min:8|confirmed',
        ]);

        if($validator->fails()) {
            return $this->response_validator_errors($validator->messages());
        }

        try {
            return DB::transaction(function () use ($request) {
                $user = User::create([
                    'given_name'    => $request->given_name,
                    'family_name'   => $request->family_name,
                    'email'         => $request->email,
                    'password'      => Hash::make($request->password)
                ]);

                $this->send_verification($user);

                return response()->json([
                    'message'   => 'User registered successfully.',
                    'data'      => [
                        'user' => $user,
                    ]
                ], 200);
            });
        } catch (\Exception $e) {
            return $this->log_exception($e);
        }
    }

    /**
     * Log the user out (Invalidate the token).
    */
    public function logout() {
        try {
            auth()->logout();
            return response()->json(['message' => 'Successfully logged out'], 200);

        } catch (\Exception $e) {
            return $this->log_exception($e);
        }
    }

    /**
     * Verify user email by JWT token
    */
    public function email_verification_token() {
        try {
            $user = auth()->user();

            return DB::transaction(function () use($user) {
                if(!$user->email_verified_at) {
                    $user->email_verified_at = Carbon::now();
                    $user->save();

                    Mail::to($user->email)->send(new EmailVerifiedNotification($user));

                    return response()->json([
                        'message'   => 'User email verified successfully',
                        'user'      => $user,
                    ], 200);
                } else {
                    return response()->json([
                        'message'   => 'User was already verified',
                        'user'      => $user,
                    ], 200);
                }
            });

        } catch (\Exception $e) {
            return $this->log_exception($e);
        }
    }

    /**
     * Send new email verification
     */
    public function send_email_verification() {
        $user = auth()->user();

        try {
            return DB::transaction(function () use ($user) {
                if(!$user->email_verified_at) {
                    $this->send_verification($user);
                    return response()->json([
                        'message'   => 'Email verification sent.',
                        'data'      => [
                            'user' => $user,
                        ]
                    ], 200);
                } else {
                    return response()->json([
                        'message'   => 'User already verified.',
                        'data'      => [
                            'user' => $user,
                        ]
                    ], 200);
                }
            });
        } catch (\Exception $e) {
            return $this->log_exception($e);
        }
    }

    /**
     * Request Reset password and send email with token for password reset.
    */
    public function forgot_password(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|exists:users,email',
        ]);

        if($validator->fails()) {
            return $this->response_validator_errors($validator->messages());
        }

        try {
            $user = User::where('email', $request->email)->firstOrFail();
            $token = auth()->tokenById($user->id);

             Mail::to($user->email)->send(new ResetPasswordLink($token, $user));

            return response()->json([ 'message' => 'Password reset email send successfully.' ], 200);

        } catch (\Exception $e) {
            return $this->log_exception($e);
        }
    }

    /**
     * Reset password.
    */
    public function reset_password(Request $request) {
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:8|confirmed',
        ]);

        if($validator->fails()) {
            return $this->response_validator_errors($validator->messages());
        }

        try {
            return DB::transaction(function () use($request) {
                $user = auth()->user();
                $user->password = Hash::make($request->password);
                $user->save();

                Mail::to($user->email)->send(new ResetedPasswordNotification($user));

                return response()->json([ 'message' => 'Password updated successfully' ], 200);
            });

        } catch (\Exception $e) {
            return $this->log_exception($e);
        }
    }
}
