<?php

namespace App\Managers;

use App\Models\Ingredient;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Pizza;

class OrderManager
{
    public static function createOrder($data)
    {
        $orderItems = $data['order'];
        $deliveryInfo = $data['delivery'];
        $total = 0;
        $orderDetails = [];

        foreach ($orderItems as $item) {
            $pizza = Pizza::find($item['id']);

            if (!empty($item['addons'])) {
                $totalAddonsPrice = 0;

                foreach ($item['addons'] as $addon) {
                    $ing = Ingredient::find($addon['id']);

                    $addons[] = [
                        'id' => $ing->id,
                        'name' => $ing->name,
                        'price' => $ing->price,
                        'count' => $addon['count'],
                        'is_vegan' => $ing->is_vegan
                    ];
                    $totalAddonsPrice += $ing->price * $addon['count'];
                }
            }

            $orderDetails[] = new OrderDetails([
                'pizza_id' => $pizza->id,
                'count' => $item['count'],
                'price' => $pizza->price,
                'addons' => $addons ?? null
            ]);

            $total += ($pizza->price + $totalAddonsPrice) * $item['count'];
        }

        $order = new Order();
        $order->amount = round($total, 2);
        $order->delivery_info = $deliveryInfo;
        $order->save();

        $order->details()->saveMany($orderDetails);

        return $order;
    }
}
