<?php

namespace App\Domain\Order;

use App\Domain\Member\Member;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="c_pay")
 */
class Order
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="order_id", type="string")
     */
    private $orderNo;

    /**
     * @ORM\Column(type="float")
     */
    private $amount;

    /**
     * @ORM\ManyToOne(targetEntity="App\Domain\Member\Member", inversedBy="orders")
     * @ORM\JoinColumn(name="mem_id")
     * @var Member
     */
    private $member;

    public function getOrderNo(): string
    {
        return $this->orderNo;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }
}
