<?php

namespace Etore\Order\ValueObjects;

use Etore\Commodity\Entities\Commodity;

class OrderItem
{
    private Commodity $commodity;
    private int $amount;
    private int $quantity;

    public function __construct(Commodity $commodity, int $amount, int $quantity)
    {
        $this->commodity = $commodity;
        $this->amount = $amount;
        $this->quantity = $quantity;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getSubtotal(): int
    {
        return $this->amount * $this->quantity;
    }

    public function getCommodityId(): int
    {
        return $this->commodity->getId();
    }

    public function getCommodityImageUrl(): string
    {
        return $this->commodity->getImageUrl();
    }

    public function getCommodityTitle(): string
    {
        return $this->commodity->getTitle();
    }

    public function getCommodityDescription(): string
    {
        return $this->commodity->getDescription();
    }

    public function getAmount(): string
    {
        return $this->amount;
    }
}
