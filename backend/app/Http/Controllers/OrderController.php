<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Http\Transformers\OrderTransformer;
use App\Managers\OrderManager;
use App\Models\Order;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    /**
     * Returns a listing of the order.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json([
            'items' => Order::all()->transform(function ($item) {
                return (new OrderTransformer())->transform($item);
            })
        ]);
    }

    /**
     * Creating a new order.
     *
     * @return JsonResponse
     */
    public function create(OrderRequest $request)
    {
        try {
            $order = OrderManager::createOrder($request->validated());
        } catch (\Throwable $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }

        return response()->json((new OrderTransformer())->transform($order));
    }
}
