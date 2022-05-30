<?php

namespace App\Http\Controllers;

use App\Http\Transformers\PizzaTransformer;
use App\Models\Pizza;
use Illuminate\Http\JsonResponse;

class PizzaController extends Controller
{
    /**
     * Returns a listing of the pizza.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json([
            'items' => Pizza::all()->transform(function ($item) {
                return (new PizzaTransformer())->transform($item);
            })
        ]);
    }
}
