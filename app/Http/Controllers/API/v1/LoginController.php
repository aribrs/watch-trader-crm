<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Services\API\v1\AuthenticationService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public static function register(Request $request)
    {

        return AuthenticationService::register($request);
    }
    public static function login(LoginRequest $request)
    {

        $input = $request->only('email', 'password');

        return AuthenticationService::login($input);
    }
}
