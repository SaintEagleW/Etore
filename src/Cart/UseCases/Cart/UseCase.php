<?php

namespace Etore\Cart\UseCases\Cart;

use Etore\Cart\Repositories\CartRepository;
use Etore\User\Repositories\UserTokenRepository;
use Etore\Commodity\Repositories\CommodityRepository;

class UseCase
{
    private CartRepository $cartRepository;
    private UserTokenRepository $userTokenRepository;
    private CommodityRepository $commodityRepository;

    public function __construct()
    {
        $this->cartRepository = new CartRepository();
        $this->userTokenRepository = new UserTokenRepository();
        $this->commodityRepository = new CommodityRepository;
    }

    public function execute(?string $token)
    {
        if (!$this->isLogin($token)) {
            return ['code' => 1, 'message' => '您尚未登入'];
        }

        $items = [];
        $userId = $this->userTokenRepository->getUserId($token);
        $cartItems = $this->cartRepository->getItems($userId);

        foreach ($cartItems as $item) {
            $commodityId = $item->getProductId();
            $commodity = $this->commodityRepository->get($commodityId);
            $is_checked = $item->getIsChecked() === 0 ? false : true;

            $items[] = [
                'commodityId' => $commodity->getID(),
                'commodityImageUrl' => $commodity->getImageUrl(),
                'commodityTitle' => $commodity->getTitle(),
                // 'sku' => $commodity->getSku(),
                'price' => $commodity->getPrice(),
                'quantity' => $item->getQuantity(),
                'is_checked' => $is_checked
            ];
        }

        return ['code' => 0, 'items' => $items];
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
