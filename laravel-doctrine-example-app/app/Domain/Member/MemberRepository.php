<?php

namespace App\Domain\Member;

interface MemberRepository
{
    public function save(Member $member);

    public function findByUsername(string $username): Member;

    public function findById(int $id): Member;
}
