<?php

namespace Etore\Coupon\UseCases\GetCoupon;

use Etore\Coupon\Entities\Coupon;

class Response
{
    private array $availableCoupons;

    public function __construct(array $availableCoupons)
    {
        $this->availableCoupons = $availableCoupons;
    }
    public function format(): array
    {
        return [
            'data' => array_map(function (Coupon $coupon) {
                return [
                    'title' => $coupon->getTitle(),
                    'desc' => $coupon->getDesc(),
                    'code' => $coupon->getCode(),
                    'discount' => $coupon->getDiscount(),
                    'type' => $coupon->getType(),
                    'expired_at' => $coupon->getExpiredAt()
                ];
            }, $this->availableCoupons)
        ];
    }
}
