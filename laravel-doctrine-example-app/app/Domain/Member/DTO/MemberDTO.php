<?php

namespace App\Domain\Member\DTO;

class MemberDTO
{
    /** @var int */
    private $id;
    /** @var string */
    private $username;

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
     * @return MemberDTO
     */
    public function setId(int $id): MemberDTO
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     *
     * @return MemberDTO
     */
    public function setUsername(string $username): MemberDTO
    {
        $this->username = $username;
        return $this;
    }
}
