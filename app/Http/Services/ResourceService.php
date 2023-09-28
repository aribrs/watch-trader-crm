<?php

namespace App\Http\Services;

class ResourceService
{
    private static function model($model)
    {
        return '\\App\\Models\\' . $model;
    }
    public static function get($model, $param = [])
    {
        $result = self::model($model)::where(true);
        foreach ($param as $key => $val) {
            $result->where($key, $val);
        }
        return $result->get();
    }
    public static function getById($model, $id)
    {
        $result = self::model($model)::find($id);
        return $result;
    }

    public static function updateOrCreate($model, $param, $data)
    {
        $result = self::model($model)::updateOrCreate($param, $data);
        return $result;
    }

    public static function store($model, $data)
    {
        $result = self::model($model)::create($data);
        return $result;
    }
    public static function update($model, $key, $data)
    {
        $result = self::model($model)::find($key)->update($data);
        return $result;
    }
    public static function destroy($model, $key)
    {
        $result = self::model($model)::destroy($key);
        return $result;
    }

}
