<?php

namespace App\Http\Transformers;

use App\Models\Order;
use League\Fractal\TransformerAbstract;

class OrderTransformer extends TransformerAbstract
{
    public function transform(Order $item)
    {
        if (!empty($item->details)) {
            foreach ($item->details as $info) {
                $details[] = [
                    'id' => $info->pizza->id,
                    'name' => $info->pizza->name,
                    'count' => $info->count,
                    'price' => $info->price,
                    'addons' => $info->addons
                ];
            }
        }

        return [
            'id' => $item->id,
            'amount' => $item->amount,
            'delivery_info' => $item->delivery_info,
            'details' => $details ?? null
        ];
    }
}
