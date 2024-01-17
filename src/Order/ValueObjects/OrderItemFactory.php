<?php

namespace Etore\Order\ValueObjects;

use Etore\Cart\Entities\CartItem;
use Etore\Commodity\Repositories\CommodityRepository;

class OrderItemFactory
{
    private CommodityRepository $commodityRepository;

    public function __construct()
    {
        $this->commodityRepository = new CommodityRepository();
    }

    public function createOrderItem(CartItem $cartItem): OrderItem
    {
        $commodity = $this->commodityRepository->get($cartItem->getProductId());

        return new OrderItem(
            $commodity,
            $commodity->getPrice(),
            $cartItem->getQuantity()
        );
    }
}
