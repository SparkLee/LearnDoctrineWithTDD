<?php

namespace App\Domain\Order;

use App\Domain\Member\Member;
use App\Domain\Order\DTO\OrderDTO;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructures\Persistence\OrderRepositoryDb")
 * @ORM\Table(name="pay")
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

    private function __construct()
    {

    }

    public static function fromDTO(OrderDTO $dto): Order
    {
        $order = new static();
        $order->amount = $dto->getAmount();
        $order->orderNo = $dto->getOrderNo();
        $order->member = $dto->getMember();
        return $order;
    }

    public function getOrderNo(): string
    {
        return $this->orderNo;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getMember(): Member
    {
        return $this->member;
    }

    public function setMember(Member $member): Order
    {
        $this->member = $member;
        return $this;
    }
}
