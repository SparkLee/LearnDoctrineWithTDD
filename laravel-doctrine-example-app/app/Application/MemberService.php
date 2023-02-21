<?php

namespace App\Application;

use App\Domain\Member\Member;
use App\Domain\Member\MemberRepository;
use Exception;
use LaravelDoctrine\ORM\Facades\EntityManager;

class MemberService
{
    /**
     * @var MemberRepository
     */
    private $memberRepository;

    /**
     * @param MemberRepository $memberRepository | 可以在 \App\Providers\AppServiceProvider::register() 中绑定仓库的接口与实现
     */
    public function __construct(MemberRepository $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    public function getProfileById(int $id): Member
    {
        return $this->memberRepository->findById($id);
    }

    public function getProfile($username): Member
    {
        return $this->memberRepository->findByUsername($username);
    }

    /**
     * @throws Exception
     */
    public function register()
    {
        EntityManager::beginTransaction();
        try {
            $member = new Member('test');
            $this->memberRepository->save($member);
            EntityManager::commit();
        } catch (Exception $e) {
            EntityManager::rollback();
            throw $e;
        }
    }

    /**
     * @throws Exception
     */
    public function register2()
    {
        EntityManager::transactional(function (\Doctrine\ORM\EntityManager $em) {
            $member = new Member('test');
            $this->memberRepository->save($member);
        });
    }

    public function modify(int $id)
    {
        EntityManager::transactional(function () use ($id) {
            $member = $this->memberRepository->findById($id);

            print_r(sprintf("username: %s\n", $member->getUserName()));

            // sleep(30);

            $member->changeUsername("111");
            $this->memberRepository->save($member);
        });
    }
}
