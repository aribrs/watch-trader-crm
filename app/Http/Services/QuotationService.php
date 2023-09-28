<?php

namespace App\Http\Services;

class QuotationService
{
    const MODEL = 'Lead';

    public static function store($data)
    {
        $lead = LeadService::store($data + ['status_id' => 2]);
        if ($lead) {
            $result = self::MODEL::create($data + ['lead_id' => $lead->id]);
        } else {
            $result = $lead;
        }
        return $result;
    }

}
