<?php

namespace App\Domain\Member;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="c_members")
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

    public function __construct(string $username)
    {
        $this->username = $username;
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
}
