<?php

namespace App\Infrastructures\Client\OrderSystem;

use App\Domain\Member\MyOrders;

class MyOrdersApi implements MyOrders
{
    /**
     * @var OrderSystemClient
     */
    private $client;

    public function __construct(OrderSystemClient $client)
    {
        $this->client = $client;
    }

    public function subList(int $from, int $to): array
    {
        // TODO: Implement subList() method.
    }

    public function getTotalOrderAmount(): float
    {
        // TODO: Implement getTotalOrderAmount() method.
    }

    public function count(): int
    {
        // TODO: Implement count() method.
    }
}
