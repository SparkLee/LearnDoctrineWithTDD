<?php

namespace App\Domain\Order;

interface OrderRepository
{
    public function of(string $orderNo): Order;
}
