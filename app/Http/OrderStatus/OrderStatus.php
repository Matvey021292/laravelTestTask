<?php


namespace App\Http\OrderStatus;


use App\Models\Order;

interface OrderStatus
{
    /**
     * @param Order $order
     * @return bool
     */
    public function isOrderStatus(Order $order): bool;

    /**
     * @param Order $order
     * @return string
     */
    public function getRoute(Order $order): string;

}
