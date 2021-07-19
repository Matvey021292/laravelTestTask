<?php


namespace App\Http\OrderStatus;


use App\Models\Order;

class DeclineOrderStatus implements OrderStatus
{
    private $status = ['declined'];
    private $route = 'sorry';
    private $attr = ['id', 'status'];

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
        return $this->route .'?'. http_build_query($order->only($this->attr));
    }
}
