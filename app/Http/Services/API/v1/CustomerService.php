<?php

namespace App\Http\Services\API\v1;

class CustomerService extends BaseService
{
    const URL = 'customer-get.php';

    public static function getData($param = [])
    {
        $param = !empty($param) ? $param : ['mode' => 'all', 'page' => 1];
        return self::getApiWT(self::URL, $param);
    }

}
