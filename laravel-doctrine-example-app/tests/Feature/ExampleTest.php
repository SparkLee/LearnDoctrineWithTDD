<?php

namespace Tests\Feature;

use App\Domain\Member\Member;
use App\Domain\Member\MemberRepository;
use App\Infrastructures\Persistence\Member\MemberRepositoryDb;
use App\Application\MemberService;
use LaravelDoctrine\ORM\Facades\EntityManager;
use Tests\TestCase;

class ExampleTest extends TestCase
{

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testVisitMemberProfile()
    {
        $response = $this->get('/members/1/profile');
        $response->assertJson([
            'id' => 1,
            'profile' => 'Member[id: 1, username: spark lee-63e492ac7b]',
        ]);
        // var_dump($response->getContent());
    }


    public function testDoctrine1()
    {
        $member = new Member('spark lee-' . uniqid());

        EntityManager::persist($member);
        EntityManager::flush();

        self::assertTrue(true);
    }

    public function testDoctrine2()
    {
        // 创建Repo实现实例的方法1：
        // 此种方法必须在Member实体中指定Repo的实现类，如：@ORM\Entity(repositoryClass="App\Persistence\MemberRepositoryDoctrine")
        // 注：若未创建实体的自定义Repository，则 EntityManager::getRepository() 会默认为其创建一个类型为Doctrine\ORM\EntityRepository仓库类
        $repository = EntityManager::getRepository(Member::class);

        // 创建Repo实现实例的方法2：
        // 此种方法无须在Member实体中指定Repo的实现类，实体类更加的纯净
        // $repository = new MemberRepositoryDoctrine(app('em'), app('em')->getClassMetaData(Member::class));

        /** @var Member $member */
        /** @var MemberRepository $repository */
        $member = $repository->find(1);
        self::assertInstanceOf(Member::class, $member);
        self::assertSame(1, $member->getId());

        $member2 = $repository->findByUsername('spark lee-63e492ac7b');
        self::assertInstanceOf(Member::class, $member);
    }

    public function testDoctrine3()
    {
        // $repository = EntityManager::getRepository(Member::class);
        $repository = new MemberRepositoryDb(app('em'), app('em')->getClassMetaData(Member::class));

        $service = new MemberService($repository);
        $profile = $service->getProfile('spark lee-63e492ac7b');

        self::assertEquals('spark lee-63e492ac7b', $profile->getUserName());
    }

    /**
     * @see http://www.laraveldoctrine.org/docs/1.8/orm/repositories
     */
    public function testDoctrine5()
    {
        $service = app()->make(MemberService::class);

        self::assertInstanceOf(MemberService::class, $service);
    }
}
