<?php

namespace Etore\Coupon\UseCases\CreatCoupon;

use Etore\Coupon\Entities\Coupon;
use Etore\Coupon\Repositories\CouponRepository;

class UseCase
{
    private CouponRepository $couponRepository;

    public function __construct()
    {
        $this->couponRepository = new CouponRepository();
    }

    public function execute(
        string $title,
        string $desc,
        string $code,
        string $type,
        int $discount,
        string $status,
        int $userId,
        string $startedAt,
        string $expiredAt
    ) {
        if ($this->isInfoMissed(
            $title,
            $desc,
            $code,
            $type,
            $discount,
            $status,
            $userId,
            $startedAt,
            $expiredAt
        )) {
            return ['code' => 1, 'message' => '資訊不完整'];
        }

        $coupon = new Coupon(
            $title,
            $desc,
            $code,
            $type,
            $discount,
            $status,
            $userId,
            $startedAt,
            $expiredAt
        );

        $this->couponRepository->add($coupon);
        return ['code' => 0, 'message' => '新增成功'];
    }

    private function isInfoMissed(
        $title,
        $desc,
        $code,
        $type,
        $discount,
        $status,
        $userId,
        $startedAt,
        $expiredAt
    ): bool {

        if (
            is_null($title) |
            is_null($desc) |
            is_null($code) |
            is_null($type) |
            is_null($discount) |
            is_null($status) |
            is_null($userId) |
            is_null($startedAt) |
            is_null($expiredAt)
        ) {
            return true;
        }

        return false;
    }
}
