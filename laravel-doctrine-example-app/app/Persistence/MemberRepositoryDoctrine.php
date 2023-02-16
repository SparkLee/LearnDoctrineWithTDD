<?php

namespace App\Persistence;

use App\Domain\Member\Member;
use App\Domain\Member\MemberRepository;
use Doctrine\ORM\EntityRepository;
use LaravelDoctrine\ORM\Facades\EntityManager;

class MemberRepositoryDoctrine extends EntityRepository implements MemberRepository
{
    public function save(Member $member)
    {
        EntityManager::persist($member);
        EntityManager::flush();
    }

    public function findByUsername(string $username): Member
    {
        return $this->findOneBy(['username' => $username]);
    }

    public function findById(int $id): Member
    {
        return $this->find($id);
    }
}
