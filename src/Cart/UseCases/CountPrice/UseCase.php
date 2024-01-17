<?php

namespace Etore\Cart\UseCases\CountPrice;

use Etore\Cart\Repositories\CartRepository;
use Etore\User\Repositories\UserTokenRepository;
use Etore\Commodity\Repositories\CommodityRepository;

class UseCase
{
    private CartRepository $cartRepository;
    private CommodityRepository $commodityRepository;
    private UserTokenRepository $userTokenRepository;

    public function __construct()
    {
        $this->cartRepository = new CartRepository();
        $this->userTokenRepository = new UserTokenRepository();
        $this->commodityRepository = new CommodityRepository();
    }

    public function execute(?string $token)
    {
        if (!$this->isLogin($token)) {
            return ['code' => 1, 'message' => '您尚未登入'];
        }

        $items = $this->getItemInfo($token);
        $sum = 0;
        for ($i = 0; $i < count($items); $i++) {
            if ($items[$i]['is_checked'] === 1) {
                $sum += ($items[$i]['price'] * $items[$i]['quantity']);
            }
        }

        return ['code' => 0, 'priceSum' => $sum];
    }

    private function isLogin(?string $token): bool
    {
        if (is_null($token)) {
            return false;
        }

        $userId = $this->userTokenRepository->getUserId($token);

        return !is_null($userId);
    }

    private function getItemInfo(string $token)
    {
        $userId = $this->userTokenRepository->getUserId($token);
        $collection = $this->cartRepository->getItems($userId);
        $items = [];

        foreach ($collection as $item) {
            $commodity = $this->commodityRepository->get($item->getProductId());
            $items[] = [
                'price' => $commodity->getPrice(),
                'quantity' => $item->getQuantity(),
                'is_checked' => $item->getIsChecked()
            ];
        }

        return $items;
    }
}
