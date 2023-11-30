<?php

namespace Etore\Counter\UseCases\Checkout;

use Etore\Cart\Repositories\CartRepository;
use Etore\Commodity\Repositories\CommodityRepository;
use Etore\User\Repositories\UserTokenRepository;

class UseCase
{
    private CartRepository $cartRepository;
    private CommodityRepository $commodityRepository;
    private UserTokenRepository $userTokenRepository;

    public function __construct()
    {
        $this->cartRepository = new CartRepository();
        $this->commodityRepository = new CommodityRepository();
        $this->userTokenRepository = new UserTokenRepository();
    }

    public function execute(?string $token): array
    {
        if (!$this->isLogin($token)) {
            return ['code' => 1, 'message' => '您尚未登入'];
        }

        $userId = $this->userTokenRepository->getUserId($token);
        $cartItems = $this->cartRepository->getCheckoutItems($userId);
        $sum = 0;
        foreach ($cartItems as $cartItem) {
            $commodityId = $cartItem['product_id'];
            $commodity = $this->commodityRepository->get($commodityId);
            $items[] = [
                'commodityTitle' => $commodity->getTitle(),
                // 'commoditySku' => $commodity->getSku(),
                'commodityImageUrl' => $commodity->getImageUrl(),
                'commodityDesc' => $commodity->getDescription(),
                'quantity' => $cartItem['quantity'],
                'price' => $cartItem['quantity'] * $commodity->getPrice()
            ];
            $sum += ($cartItem['quantity'] * $commodity->getPrice());
        }

        $checkoutItems = [
            'items' => $items,
            'subtotal' => $sum
        ];

        return ['code' => 0, 'items' => $checkoutItems];
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
