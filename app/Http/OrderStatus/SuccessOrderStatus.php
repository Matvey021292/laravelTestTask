<?php


namespace App\Http\OrderStatus;


use App\Models\Order;

class SuccessOrderStatus implements OrderStatus
{
    private $status = ['success'];
    private $route = 'thank-you';

    /**
     * @param Order $order
     * @return bool
     */
    public function isOrderStatus(Order $order): bool
    {
        return in_array($order->status, $this->status );
    }

    /**
     * @param Order $order
     * @return string
     */
    public function getRoute(Order $order): string
    {
       return $this->route;
    }
}
