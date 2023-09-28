<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Services\API\v1\BaseService;
use App\Http\Services\QuotationService;
use App\Http\Services\ResourceService;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    public static function store(Request $request)
    {
        $result = QuotationService::store($request->all());
        if ($result) {
            return BaseService::postResponse(200, $result, 'Saved Successfully');
        } else {
            return BaseService::errorResponse(422, $result);
        }
    }
    public static function update(Request $request)
    {
        $result = ResourceService::update('Quotation', $request->id, $request->except(['id']));
        if ($result) {
            return BaseService::postResponse(200, $result, 'Updated Successfully');
        } else {
            return BaseService::errorResponse(422, $result);
        }
    }
}
