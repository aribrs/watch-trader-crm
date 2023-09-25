<?php

namespace App\Exceptions\API;

use Exception;
use Illuminate\Contracts\Validation\Validator;

class ValidationException extends Exception
{
    protected $validator;

    protected $code = 422;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    public function render()
    {
        // return a json with desired format
        return response()->json([
            "errors" => [
                "code" => $this->code,
                "detail" => $this->validator->errors()->first(),
            ]
        ], $this->code);
    }
}
