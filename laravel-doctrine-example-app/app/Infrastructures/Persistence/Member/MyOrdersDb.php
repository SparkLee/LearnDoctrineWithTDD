<?php

namespace App\Infrastructures\Persistence\Member;

use App\Domain\Member\Member;
use App\Domain\Member\MyOrders;
use App\Domain\Order\Order;
use LaravelDoctrine\ORM\Facades\EntityManager;

class MyOrdersDb implements MyOrders
{
    /**
     * @var Member
     */
    private $member;

    public function __construct(Member $member)
    {
        $this->member = $member;
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
    }
}
