<?php

namespace Tests\Feature\Infrastructures\Persistence;

use App\Domain\Member\DTO\MemberDTO;
use App\Domain\Member\Member;
use App\Domain\Order\DTO\OrderDTO;
use App\Domain\Order\Order;
use App\Domain\Order\OrderRepository;
use Illuminate\Support\Facades\DB;
use LaravelDoctrine\ORM\Facades\EntityManager;
use Tests\TestCase;

class OrderRepositoryDbTest extends TestCase
{
    public function test_should_save_order()
    {
        $member = Member::fromDTO(
            (new MemberDTO())
                ->setUsername('lee')
        );
        $order = Order::fromDTO(
            (new OrderDTO())
                ->setAmount(648)
                ->setOrderNo('123456')
                ->setMember($member)
        );
        EntityManager::persist($member);
        EntityManager::persist($order);
        EntityManager::flush();

        /** @var OrderRepository $orderRepository */
        $orderRepository = EntityManager::getRepository(Order::class);
        $orderFound = $orderRepository->of('123456');
        $this->assertSame(648.0, $orderFound->getAmount());
        $this->assertSame('lee', $orderFound->getMember()->getUserName());
    }

    public function test_should_load_the_member_of_order_lazily()
    {
        DB::delete("DELETE FROM c_pay WHERE mem_id = 1");
        DB::delete("DELETE FROM c_members WHERE id = 1");
        DB::insert("INSERT INTO c_members (id, username) VALUES (1, 'lee')");
        DB::insert("INSERT INTO c_pay (order_id, amount, mem_id) VALUES ('123456', '648', 1)");

        /** @var OrderRepository $orderRepository */
        $orderRepository = EntityManager::getRepository(Order::class);
        $order = $orderRepository->of('123456');
        $this->assertSame(648.0, $order->getAmount());

        $this->assertInstanceOf(Member::class, $order->getMember());
        $this->assertSame('lee', $order->getMember()->getUserName());
    }
}
