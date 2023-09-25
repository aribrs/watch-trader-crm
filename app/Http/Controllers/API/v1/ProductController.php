<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Services\API\v1\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public static function getData(){
        return ProductService::getData();
    }
}
