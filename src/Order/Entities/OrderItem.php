<?php

namespace Etore\Order\Entities;

use Etore\Commodity\Entities\Commodity;

class OrderItem
{
    private int $id;
    private int $userId;
    private Commodity $product;
    private int $quantity;

    public function __construct(int $userId, Commodity $product, int $quantity, int $id = -1)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getProductId(): int
    {
        return $this->product->getID();
    }

    public function getProductPrice(): int
    {
        return $this->product->getPrice();
    }

    public function getProductName(): string
    {
        return $this->product->getProductName();
    }

    public function getProductSku(): string
    {
        return $this->product->getSku();
    }

    public function getProductPicUrl(): string
    {
        return $this->product->getImageUrl();
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }
}
