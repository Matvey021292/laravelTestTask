<?php


namespace App\Http\OrderStatus;


use App\Models\Order;

class OrderStatusRoute
{
    private $status;

    /**
     * OrderStatusRoute constructor.
     */
    public function __construct()
    {
        $this->status = [
            new SuccessOrderStatus(),
            new DeclineOrderStatus(),
        ];
    }

    /**
     * @param Order $order
     * @return mixed
     */
    public function getRoute(Order $order){
        foreach ($this->status as $status){
            if($status->isOrderStatus($order)){
                return $status->getRoute($order);
            }
        }
    }
}
