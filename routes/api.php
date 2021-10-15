<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// AUTHENTICATION
use App\Http\Controllers\AuthController;


Route::view('/', 'welcome');

//AUTH ROUTES
Route::group([ 'prefix' => 'auth' ], function () {
    Route::post('/login',                       [ AuthController::class, 'login'                     ]);
    Route::post('/register',                    [ AuthController::class, 'register'                  ]);
    Route::post('/logout',                      [ AuthController::class, 'logout'                    ])->middleware('api_jwt_auth');

    Route::post('/email-verification-by-token', [ AuthController::class, 'email_verification_token'  ])->middleware('api_jwt_auth');
    Route::post('/send-email-verification',     [ AuthController::class, 'send_email_verification'   ])->middleware('api_jwt_auth');

    Route::post('/forgot-password',             [ AuthController::class, 'forgot_password'           ]);
    Route::post('/reset-password',              [ AuthController::class, 'reset_password'            ])->middleware('api_jwt_auth');
});


Route::middleware(['api_jwt_auth', 'email_verification'])->group(function () {
    Route::get('/test', function () {
        return response()->json(['message' => 'Test Route Accessed'], 200);
    });
});