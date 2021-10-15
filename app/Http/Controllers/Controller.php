<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function response_validator_errors($errors) {
        return response()->json([
            'message' => 'Request fields validation failed',
            'errors'  => $errors
        ], 200);
    }

    public function log_exception($e) {
        return $e;
    }
}
