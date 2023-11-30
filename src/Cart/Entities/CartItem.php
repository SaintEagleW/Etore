<?php

namespace Etore\Cart\Entities;

class CartItem
{
    private int $id;
    private int $userId;
    private int $productId;
    private int $quantity;
    private int $isChecked;

    public function __construct(
        int $userId,
        int $productId,
        int $quantity,
        int $isChecked = 1,
        int $id = -1
    ) {
        $this->id = $id;
        $this->userId = $userId;
        $this->productId = $productId;
        $this->quantity = $quantity;
        $this->isChecked = $isChecked;
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
        return $this->productId;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getIsChecked(): int
    {
        return $this->isChecked;
    }

    public function updateQuantity(int $quantity)
    {
        $this->quantity = $quantity;
    }

    public function updateIsChecked(int $isChecked)
    {
        $this->isChecked = $isChecked;
    }
}
