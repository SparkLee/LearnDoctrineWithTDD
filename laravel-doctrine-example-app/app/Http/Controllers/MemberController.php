<?php

namespace App\Http\Controllers;

use App\Domain\Order\Order;
use App\Http\Controllers\Responses\MemberOrderResponse;
use App\Services\MemberService;
use Exception;
use Illuminate\Http\JsonResponse;

class MemberController extends Controller
{
    /**
     * 由 Laravel 框架自动通过依赖注入容器中进行递归解析并实例化
     *
     * @var MemberService
     */
    private $memberService;

    public function __construct(MemberService $memberService)
    {
        $this->memberService = $memberService;
    }

    /**
     * @param int $id 由 Laravel 框架自动从请求的 URL 地址中获取
     *
     * @return JsonResponse
     */
    public function profile(int $id)
    {
        $member = $this->memberService->getProfileById($id);

        /** @var Order $firstOrder */
        $firstOrder = $member->getOrders()->get(0);

        return response()
            ->json([
                'id' => $id,
                'profile' => (string)$member,
                'firstOrder' => MemberOrderResponse::fromOrderEntity($firstOrder)->toArray(),
            ])
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

    public function register()
    {
        try {
            $this->memberService->register();
            return response()->json('register successfully.');
        } catch (Exception $e) {
            return response()->json('holy shit: ' . $e->getMessage());
        }
    }
}
