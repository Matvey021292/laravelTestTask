<?php

namespace App\Http\Controllers;

use App\Http\OrderStatus\OrderStatusRoute;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Http\JsonResponse;

class ApiController extends Controller
{

    /**
     * @param OrderRequest $request
     * @return JsonResponse
     */
    public function callback(OrderRequest $request): JsonResponse
    {
        $orderData = $request->only(['order.order_id', 'order.status']);

        $orderModel = Order::updateOrCreate(
            ['id' => $orderData['order']['order_id']],
            ['status' => $orderData['order']['status']]
        );

       $orderStatusRotes = new OrderStatusRoute();
       $response = $orderStatusRotes->getRoute($orderModel);

        return response()->json([
            'redirect' => $response,
        ]);
    }

}
