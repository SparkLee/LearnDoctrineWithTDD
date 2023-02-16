<?php

namespace Tests\Feature\Domain\Member;

use App\Domain\Member\Member;
use App\Domain\Member\MemberRepository;
use LaravelDoctrine\ORM\Facades\EntityManager;
use Tests\TestCase;

class MemberRepositoryTest extends TestCase
{
    public function test_should_save_member()
    {
        /** @var MemberRepository $repository */
        $repository = EntityManager::getRepository(Member::class);

        $member = new Member('spark');
        $repository->save($member);

        $spark = $repository->findByUsername('spark');
        self::assertSame('spark', $spark->getUserName());
    }

}
