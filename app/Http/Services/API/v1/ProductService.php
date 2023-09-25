<?php

namespace App\Http\Services\API\v1;

class ProductService extends BaseService
{
    const URL = 'product-get.php';

    public static function getData($param = [])
    {
        $param = !empty($param) ?: ['mode' => 'all', 'page' => 1];
        return self::getApiWT(self::URL, $param);
    }
}
