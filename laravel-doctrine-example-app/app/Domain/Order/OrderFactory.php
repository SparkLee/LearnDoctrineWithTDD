<?php

namespace App\Domain\Order;

class OrderFactory
{
    public function make(): Order
    {
        $order = new Order();
        $order->setOrderNo('111');
    }
}
