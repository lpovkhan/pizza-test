<?php

namespace Tests\Feature\Controllers;

use App\Models\Ingredient;
use App\Models\Pizza;
use Exception;

class OrderControllerTest extends ControllerTestCase
{
    /**
     * @return void
     * @throws Exception
     */
    public function test_create_order_success()
    {
        [$total, $postData] = $this->_getData();
        $response = $this->postJson(route('order.create'), $postData);
        $response->assertStatus(200);
        $response->assertJsonStructure(
            [
                'id',
                'amount',
                'delivery_info' => ['name', 'address'],
                'details' => [['id', 'name', 'count', 'price', 'addons']]
            ]
        );
        $content = json_decode($response->getContent());

        self::assertEquals($total, $content->amount);
    }

    public function test_get_orders_list_success()
    {
        $response = $this->getJson(route('order.list'));
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'items' =>
                [
                    [
                        'id',
                        'amount',
                        'delivery_info' => ['name', 'address'],
                        'details' => [
                            ['id', 'name', 'count', 'price', 'addons']
                        ]
                    ]
                ]
        ]);
    }

    public function test_create_with_empty_data()
    {
        $response = $this->sendPost('/order');
        $response->assertStatus(422);
    }

    /**
     * @throws Exception
     */
    private function _getData()
    {
        $pizza = Pizza::inRandomOrder()->first();
        $addons = Ingredient::inRandomOrder()->limit(2)->get(['id', 'price'])->toArray();
        $pizzaCount = random_int(1, 5);
        $addon0Cnt = random_int(1, 5);
        $addon1Cnt = random_int(1, 5);
        $total = ($addons[0]['price'] * $addon0Cnt + $addons[1]['price'] * $addon1Cnt + $pizza->price) * $pizzaCount;

        return [
            $total,
            [
                'delivery' => [
                    'name' => $this->faker->firstName.' '.$this->faker->lastName,
                    'address' => $this->faker->address
                ],
                'order' => [
                    [
                        'id' => $pizza->id,
                        'count' => $pizzaCount,
                        'addons' => [
                            [
                                'id' => $addons[0]['id'],
                                'count' => $addon0Cnt
                            ],
                            [
                                'id' => $addons[1]['id'],
                                'count' => $addon1Cnt
                            ]
                        ]
                    ]
                ]
            ]
        ];
    }
}
