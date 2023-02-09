<?php

namespace App\Services;

use App\Domain\Member\Member;
use App\Domain\Member\MemberRepository;

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
}
