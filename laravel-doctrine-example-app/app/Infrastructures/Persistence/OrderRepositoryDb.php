<?php

namespace App\Infrastructures\Persistence;

use App\Domain\Order\Order;
use App\Domain\Order\OrderRepository;
use Doctrine\ORM\EntityRepository;

class OrderRepositoryDb extends EntityRepository implements OrderRepository
{

    public function of(string $orderNo): Order
    {
        return $this->findOneBy(['orderNo' => $orderNo]);
    }
}
