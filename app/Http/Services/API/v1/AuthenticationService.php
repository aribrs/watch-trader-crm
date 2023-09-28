<?php

namespace App\Http\Services\API\v1;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthenticationService extends BaseService
{
    public static function register(Request $request): JsonResponse
    {

        $validator = Validator::make($request->all(), [

            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',

        ]);

        if ($validator->fails()) {

            return self::errorResponse(422, 'Validation Error:' . $validator->errors());

        }

        $input = $request->all();

        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);

        return self::postResponse(200, $user, 'User register successfully.');

    }
    public static function login($request = [])
    {
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {

            $user = Auth::user();

            $token = $user->createToken('Personal Token')->plainTextToken;

            return self::postResponse(200, compact('user', 'token'), 'User login successfully.');

        } else {

            return self::errorResponse(401, 'Unauthorized.');

        }
    }
}
