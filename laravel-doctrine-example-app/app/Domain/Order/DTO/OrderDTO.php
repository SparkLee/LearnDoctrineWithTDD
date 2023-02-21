<?php

namespace App\Domain\Order\DTO;

use App\Domain\Member\Member;

class OrderDTO
{
    /** @var int */
    private $id;
    /** @var string */
    private $orderNo;
    /** @var float */
    private $amount;
    /** @var Member */
    private $member;

    /**
     * @return Member
     */
    public function getMember(): Member
    {
        return $this->member;
    }

    /**
     * @param Member $member
     *
     * @return OrderDTO
     */
    public function setMember(Member $member): OrderDTO
    {
        $this->member = $member;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return OrderDTO
     */
    public function setId(int $id): OrderDTO
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderNo(): string
    {
        return $this->orderNo;
    }

    /**
     * @param string $orderNo
     *
     * @return OrderDTO
     */
    public function setOrderNo(string $orderNo): OrderDTO
    {
        $this->orderNo = $orderNo;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     *
     * @return OrderDTO
     */
    public function setAmount(float $amount): OrderDTO
    {
        $this->amount = $amount;
        return $this;
    }
}
