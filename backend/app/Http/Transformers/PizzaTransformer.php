<?php

namespace App\Http\Transformers;

use App\Models\Pizza;
use League\Fractal\TransformerAbstract;

class PizzaTransformer extends TransformerAbstract
{
    public function transform(Pizza $pizza)
    {
        return [
            'id' => $pizza->id,
            'name' => $pizza->name,
            'type' => ((Pizza::types())[$pizza->type])??null,
            'price' => $pizza->price
        ];
    }
}
