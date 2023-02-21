<?php

namespace App\Domain\Member;

use App\Domain\Order\Order;

interface MyOrders
{
    /**
     * @param int $from
     * @param int $to
     *
     * @return Order[]
     */
    public function subList(int $from, int $to): array;

    /**
     * @return float
     */
    public function getTotalOrderAmount(): float;

    /**
     * @return int
     */
    public function count(): int;
}
