<?php

namespace Infrastructures\Persistence\Member;

use App\Domain\Member\Member;
use App\Domain\Member\MemberRepository;
use Illuminate\Support\Facades\DB;
use LaravelDoctrine\ORM\Facades\EntityManager;
use Tests\TestCase;

class MemberRepositoryTest extends TestCase
{
    public function test_should_load_orders_of_member_lazily()
    {
        $this->setUpTestData();

        /** @var MemberRepository $memberRepository */
        $memberRepository = EntityManager::getRepository(Member::class);

        $member = $memberRepository->findById(1);
        $this->assertSame('lee', $member->getUserName());

        $orders = $member->getOrders();
        $this->assertCount(3, $orders);
        self::assertSame('111', $orders->get(0)->getOrderNo());
    }

    private function setUpTestData(): void
    {
        DB::delete("DELETE FROM c_pay WHERE mem_id = 1");
        DB::delete("DELETE FROM c_members WHERE id = 1");
        DB::insert("INSERT INTO c_members (id, username) VALUES (1, 'lee')");
        DB::insert("INSERT INTO c_pay (order_id, amount, mem_id) VALUES ('111', '648', 1)");
        DB::insert("INSERT INTO c_pay (order_id, amount, mem_id) VALUES ('222', '648', 1)");
        DB::insert("INSERT INTO c_pay (order_id, amount, mem_id) VALUES ('333', '648', 1)");
    }

    public function test_should_paging_load_orders_of_member_using_the_extra_lazy_feature()
    {
        $this->setUpTestData();

        /** @var MemberRepository $memberRepository */
        $memberRepository = EntityManager::getRepository(Member::class);
        $member = $memberRepository->findById(1);

        $collection = $member->getOrders();
        $orders1 = $collection->slice(0, 2);
        $this->assertCount(2, $orders1);
        self::assertSame('111', $orders1[0]->getOrderNo());
        self::assertSame('222', $orders1[1]->getOrderNo());

        $orders2 = $member->getOrders()->slice(2, 1);
        $this->assertCount(1, $orders2);
        self::assertSame('333', $orders2[0]->getOrderNo());

        self::assertSame(3, $member->getOrders()->count());
        self::assertTrue($member->getOrders()->contains($orders1[0]));
        self::assertTrue($member->getOrders()->containsKey(0));
        self::assertSame('111', $member->getOrders()->get(0)->getOrderNo());
    }
}
