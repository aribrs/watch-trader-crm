<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Services\API\v1\CustomerService;

class CustomerController extends Controller
{
    public static function getData()
    {
        return CustomerService::getData();
    }
}
