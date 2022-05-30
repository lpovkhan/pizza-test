<?php

namespace App\Http\Transformers;

use App\Models\Ingredient;
use League\Fractal\TransformerAbstract;

class IngredientTransformer extends TransformerAbstract
{
    public function transform(Ingredient $item)
    {
        return [
            'id' => $item->id,
            'name' => $item->name,
            'price' => $item->price,
            'is_vegan' => ($item->is_vegan === 1)
        ];
    }
}
