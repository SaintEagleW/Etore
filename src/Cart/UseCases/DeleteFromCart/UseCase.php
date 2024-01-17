<?php

namespace Etore\Cart\UseCases\DeleteFromCart;

use Etore\Cart\Repositories\CartRepository;
use Etore\User\Repositories\UserTokenRepository;

class UseCase
{
    private CartRepository $cartRepository;
    private UserTokenRepository $userTokenRepository;

    public function __construct()
    {
        $this->cartRepository = new CartRepository();
        $this->userTokenRepository = new UserTokenRepository();
    }

    public function execute(?string $token, int $productId)
    {
        if (!$this->isLogin($token)) {
            return ['code' => 1, 'message' => '您尚未登入'];
        }
        $userId = $this->userTokenRepository->getUserId($token);
        $this->deleteItem($userId, $productId);

        return ['code' => 0];
    }

    private function isLogin(?string $token): bool
    {
        if (is_null($token)) {
            return false;
        }

        $userId = $this->userTokenRepository->getUserId($token);

        return !is_null($userId);
    }

    private function deleteItem(int $userId, int $productId)
    {
        $this->cartRepository->deleteItems($userId, $productId);
    }
}
