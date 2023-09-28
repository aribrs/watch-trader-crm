<?php

namespace App\Http\Services\API\v1;

use Illuminate\Support\Facades\Http;

class BaseService
{
    public static function getApi($url, $queryParam = [])
    {
        $response = Http::get($url, $queryParam);

        $data = self::setNullToEmptyString($response['data']);

        return self::getResponse(200, $data);
    }

    public static function getApiWT($url, $queryParam = [])
    {
        $endpoint = env('WT_BASE_URL') . $url;

        $response = Http::get($endpoint, [
            'key' => env('WT_API_KEY'),
        ] + $queryParam);

        // $data = self::setNullToEmptyString($response['Data']);
        $data = $response['Data'];

        return self::getResponse(200, $data);
    }

    public static function errorResponse($code, $detail)
    {
        return response()->json([
            'errors' => [
                'code' => $code,
                'detail' => $detail,
            ],
        ], $code);
    }

    public static function getResponse($code, $data)
    {
        return response()->json([
            'meta' => [
                'total' => count($data)
            ],
            'data' => $data
        ], $code);
    }

    public static function postResponse($code, $data, $detail)
    {
        return response()->json([
            'success' => [
                'code' => $code,
                'data' => $data,
                'detail' => $detail,
            ],
        ], $code);
    }

    public static function setNullToEmptyString($data){
        $result = [];

        foreach($data as $val){
            $result[] = array_map(function ($value) {
                return $value === null ? '' : $value;
            }, $val);

        }

        return $result;
    }

}
