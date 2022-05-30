<?php

namespace App\Http\Controllers;

use App\Http\Transformers\IngredientTransformer;
use App\Models\Ingredient;
use Illuminate\Http\JsonResponse;

class IngredientController extends Controller
{
    /**
     * Returns a listing of the ingredients.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json([
            'items' => Ingredient::all()->transform(function ($item) {
                return (new IngredientTransformer())->transform($item);
            })
        ]);
    }
}
