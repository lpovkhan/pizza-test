<?php

namespace Tests\Feature\Controllers;


class IngredientControllerTest extends ControllerTestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_ingredient_list_success()
    {
        $response = $this->getJson(route('ingredient.list'));
        $response->assertStatus(200);
        $response->assertJsonStructure(['items' => [['id', 'name', 'price', 'is_vegan']]]);
    }
}
