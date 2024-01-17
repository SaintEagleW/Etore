<?php

namespace Etore\Cart\UseCases\UpdateItems;

use Etore\Cart\Entities\CartItem;
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

    public function execute(?string $token, ?int $isChecked)
    {
        if (!$this->isLogin($token)) {
            return ['code' => 1, 'message' => '您尚未登入'];
        }

        $userId = $this->userTokenRepository->getUserId($token);
        $cartCollection = $this->cartRepository->getItems($userId);
        foreach ($cartCollection as $cart) {
            $cartItem = new CartItem($userId, $cart->getProductId(), $cart->getQuantity(), $isChecked);
            $this->cartRepository->updateItem($cartItem);
        }

        return ['code' => 0, 'message' => '更新成功'];
    }

    private function isLogin(?string $token): bool
    {
        if (is_null($token)) {
            return false;
        }

        $userId = $this->userTokenRepository->getUserId($token);

        return !is_null($userId);
    }
}
