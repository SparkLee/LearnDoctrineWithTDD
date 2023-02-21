<?php

namespace App\Domain\Member;

use App\Domain\Member\DTO\MemberDTO;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructures\Persistence\Member\MemberRepositoryDb")
 * @ORM\Table(name="members")
 */
class Member
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $username;

    /**
     * 玩家的订单列表（玩家可以自助查询自己的订单列表）
     *
     * @var Collection
     * @ORM\OneToMany(targetEntity="App\Domain\Order\Order", mappedBy="member", fetch="EXTRA_LAZY")
     */
    private $orders;

    /**
     * @var MyOrders
     */
    private $myOrders;

    public function __construct(string $username)
    {
        $this->username = $username;
    }

    public static function fromDTO(MemberDTO $dto): Member
    {
        $member = new static($dto->getUsername());
        return $member;
    }

    public function getUserName(): string
    {
        return $this->username;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function __toString(): string
    {
        return "Member[id: {$this->id}, username: {$this->username}]";
    }

    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function changeUsername(string $username): self
    {
        if (empty($username)) {
            throw new \InvalidArgumentException("username cannot be empty");
        }

        $this->username = $username;
        return $this;
    }

    /**
     * @return MyOrders
     */
    public function getMyOrders(): MyOrders
    {
        return $this->myOrders;
    }

    /**
     * @param MyOrders $myOrders
     */
    public function setMyOrders(MyOrders $myOrders): void
    {
        $this->myOrders = $myOrders;
    }
}
