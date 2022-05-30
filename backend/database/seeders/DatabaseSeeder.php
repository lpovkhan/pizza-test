<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Pizza;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private $_pizzaNames = [
        'Neapolitan Pizza',
        'Chicago Pizza',
        'New York-Style Pizza',
        'California Pizza',
        'Greek Pizza'
    ];

    private $_ingredients = [
        'onion' => 1,
        'tomatoes' => 1,
        'bacon' => 0,
        'chilli' => 1,
        'mushroom' => 1
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $types = Pizza::types();
        $price = 10;
        foreach ($this->_pizzaNames as $name) {
            foreach ($types as $type => $typeName) {
                Pizza::factory()->create(['name' => $name, 'type' => $type, 'price' => $price + $type]);
            }
            $price += 2;
        }

        foreach ($this->_ingredients as $iName => $isVegan) {
            Ingredient::factory()->create(['name' => $iName, 'price' => 0.5, 'is_vegan' => $isVegan]);
        }


    }



}
