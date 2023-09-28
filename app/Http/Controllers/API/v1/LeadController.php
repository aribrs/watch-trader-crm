<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Services\API\v1\BaseService;
use App\Http\Services\LeadService;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public static function store(Request $request)
    {
        $result = LeadService::store($request->all());
        if ($result) {
            return BaseService::postResponse(200, $result, 'Saved Successfully');
        } else {
            return BaseService::errorResponse(422, $result);
        }
    }
    public static function update(Request $request)
    {
        $result = LeadService::update($request->id, $request->except(['id']));
        if ($result) {
            return BaseService::postResponse(200, $result, 'Updated Successfully');
        } else {
            return BaseService::errorResponse(422, $result);
        }
    }
}
