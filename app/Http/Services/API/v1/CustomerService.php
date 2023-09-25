<?php

namespace App\Http\Services\API\v1;

class CustomerService extends BaseService
{
    const URL = 'customer-get.php';

    public static function getData($param = ['mode' => 'all'])
    {
        return self::getApiWT(self::URL, $param);
    }
}
