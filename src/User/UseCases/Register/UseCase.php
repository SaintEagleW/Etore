<?php

namespace Etore\User\UseCases\Register;

use Etore\User\Entites\User;
use Etore\Coupon\Entities\Coupon;
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

    public function execute(string $email, string $password, string $passwordConfirm): array
    {
        if (!$this->isPasswordMatch($password, $passwordConfirm)) {
            return ['code' => 1, 'message' => '密碼不相符，請重新確認密碼。'];
        } elseif ($this->isUserExist($email)) {
            return ['code' => 2, 'message' => '用戶已存在，請使用其他信箱註冊。'];
        }

        $this->registerUser($email, $password);
        $this->getNewUserCoupon($email);
        return ['code' => 0, 'message' => '註冊成功，請重新登入。'];
    }

    private function isPasswordMatch(string $password, string $passwordConfirm): bool
    {
        return $password === $passwordConfirm;
    }

    private function isUserExist(string $email)
    {
        return !is_null($this->userRepository->getUserByEmail($email));
    }

    private function registerUser($email, $password)
    {
        $user = new User($email, $password);
        $this->userRepository->addUser($user);
    }

    private function getNewUserCoupon($email)
    {
        $user = $this->userRepository->getUserByEmail($email);
        $coupon = new Coupon(
            "New User Gift",
            "Welcome to join Etore. We prepared a new user gift for you, and you can use this coupon to get once 5% off chance. Feel free to choose your favourites! ",
            "NewUser2023",
            "percentage",
            95,
            "available",
            $user->getId(),
            now()->format('Y-m-d H:i:s'),
            now()->addMonths(2)->endOfDay()->format('Y-m-d H:i:s')
        );

        $this->couponRepository->add($coupon);
    }
}
