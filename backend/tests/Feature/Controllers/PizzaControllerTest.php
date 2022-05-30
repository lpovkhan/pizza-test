<?php

namespace Tests\Feature\Controllers;

class PizzaControllerTest extends ControllerTestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_pizza_list_success()
    {
        $response = $this->getJson(route('pizza.list'));
        $response->assertStatus(200);
        $response->assertJsonStructure(['items' => [['id', 'name', 'type', 'price']]]);
    }
}
