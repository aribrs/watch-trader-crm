<?php

namespace App\Http\Services;

use App\Models\Customer;
use App\Models\Product;

class LeadService
{
    const MODEL = 'Lead';

    public static function store($data)
    {
        $customer = self::syncCustomer($data);
        if (!$customer) {
            return $customer;
        }

        $product = self::syncProduct($data);
        if (!$product) {
            return $product;
        }

        if ($data->secondary_product_id) {
            $secondaryProduct = self::syncProduct($data, true);
            if (!$secondaryProduct) {
                return $secondaryProduct;
            }
        }

        $result = self::MODEL::create($data);

        return $result;
    }

    public static function update($id, $data)
    {
        $customer = self::syncCustomer($data);
        if (!$customer) {
            return $customer;
        }

        $product = self::syncProduct($data);
        if (!$product) {
            return $product;
        }

        if ($data->secondary_product_id) {
            $secondaryProduct = self::syncProduct($data, true);
            if (!$secondaryProduct) {
                return $secondaryProduct;
            }
        }

        $result = self::MODEL::find($id)->update($data);

        return $result;
    }
    public static function syncCustomer($data)
    {
        return Customer::updateOrCreate(
            ['id' => $data->customer_id],
            ['id' => $data->customer_id,
                'fullname' => $data->customer_name,
                'gender' => $data->gender,
                'address' => $data->address,
                'birth_date' => $data->birth_date,
                'email' => $data->email,
                'phone_number' => $data->phone_number,
            ]
        );
    }
    public static function syncProduct($data, $secondary = false)
    {

        if ($secondary) {
            return Product::updateOrCreate(
                ['id' => $data->secondary_product_id],
                ['id' => $data->secondary_product_id,
                    'code' => $data->secondary_product_code,
                    'name' => $data->secondary_product_name,
                    'base_price' => $data->secondary_product_base_price,
                    'price' => $data->secondary_product_price,
                    'pict_url' => $data->secondary_product_pict_url,
                ]
            );
        } else {
            return Product::updateOrCreate(
                ['id' => $data->product_id],
                ['id' => $data->product_id,
                    'code' => $data->product_code,
                    'name' => $data->product_name,
                    'base_price' => $data->product_base_price,
                    'price' => $data->product_price,
                    'pict_url' => $data->product_pict_url,
                ]
            );
        }

    }
}
