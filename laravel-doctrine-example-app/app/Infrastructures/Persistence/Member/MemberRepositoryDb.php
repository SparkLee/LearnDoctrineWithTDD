<?php

namespace App\Infrastructures\Persistence\Member;

use App\Domain\Member\Member;
use App\Domain\Member\MemberRepository;
use Doctrine\ORM\EntityRepository;
use LaravelDoctrine\ORM\Facades\EntityManager;

class MemberRepositoryDb extends EntityRepository implements MemberRepository
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
        $member = $this->find($id);
        return $this->setMyOrders($member);
    }

    private function setMyOrders(Member $member): Member
    {
        $member->setMyOrders(new MyOrdersDb($member));
        return $member;
    }
}
