<?php

namespace Etore\Cart\UseCases\AddToCart;

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

    public function execute(?string $token, int $productId, int $quantity)
    {
        if (!$this->isLogin($token)) {
            return ['code' => 1, 'message' => '您尚未登入'];
        }

        $userId = $this->userTokenRepository->getUserId($token);

        if ($this->isProdcutInCart($userId, $productId)) {
            $this->updateQuantity($userId, $productId, $quantity);
            return ['code' => 0, 'message' => '成功加入購物車'];
        }

        $cartItem = new CartItem($userId, $productId, $quantity);

        $this->cartRepository->addItem($cartItem);

        return ['code' => 0, 'message' => '成功加入購物車'];
    }

    private function isLogin(?string $token): bool
    {
        if (is_null($token)) {
            return false;
        }

        $userId = $this->userTokenRepository->getUserId($token);

        return !is_null($userId);
    }

    private function isProdcutInCart(int $userId, int $productId): bool
    {
        $products = $this->cartRepository->getItems($userId);
        for ($i = 0; $i < count($products); $i++) {
            if ($products[$i]->getProductId() === $productId) {
                return true;
            }
        }

        return false;
    }

    private function updateQuantity(int $userId, int $productId, int $quantity)
    {
        $item = $this->cartRepository->getItem($userId, $productId);
        $newQuantity = $item['quantity'] + $quantity;
        $cartItem = new CartItem($userId, $productId, $newQuantity);
        $this->cartRepository->updateItem($cartItem);
    }
}
