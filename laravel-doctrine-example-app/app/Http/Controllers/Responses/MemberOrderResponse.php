<?php

namespace App\Http\Controllers\Responses;

use App\Domain\Order\Order;

class MemberOrderResponse
{
    private $orderNo;
    private $amount;

    public static function fromOrderEntity(Order $order): self
    {
        $memberOrderResponse = new static();
        $memberOrderResponse->orderNo = $order->getOrderNo();
        $memberOrderResponse->amount = $order->getAmount();
        return $memberOrderResponse;
    }

    public function toArray(): array
    {
        return [
            'order_no' => $this->orderNo,
            'amount' => $this->amount,
            'formatted_amount' => $this->formatAmount(),
        ];
    }

    private function formatAmount(): string
    {
        return sprintf("人民币：￥%.2f", $this->amount);
    }
}
