<?php

namespace Etore\Coupon\UseCases\GetCoupon;

use Etore\Coupon\Entities\Coupon;
use Etore\Coupon\Exception\CouponException;
use Etore\Coupon\Exception\ErrorCode;
use Etore\User\Repositories\UserRepository;
use Etore\Coupon\Repositories\CouponRepository;

class UseCase
{
    private UserRepository $userRepository;
    private CouponRepository $couponRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->couponRepository = new CouponRepository();
    }

    public function execute(Request $request): Response
    {
        $token = $request->getToken();
        $user = $this->userRepository->getUserByToken($token);

        if (is_null($user)) {
            throw new CouponException(ErrorCode::UserNotFound);
        }

        $coupons = $this->couponRepository->get($user->getId());
        $availableCoupons = array_values(array_filter($coupons, function (Coupon $coupon) {
            return $coupon->getExpiredAt() > now();
        }));

        return new Response($availableCoupons);
    }
}
