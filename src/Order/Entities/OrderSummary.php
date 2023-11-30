<?php

namespace Etore\Order\Entities;

class OrderSummary
{
    private int $orderNo;
    private int $totalAmount;
    private string $purchasedAt;
    private string $status;
    private int $itemQuantity;
    private string $itemTitle;
    private string $itemSku;
    private string $itemImageUrl;

    public function __construct(
        int $orderNo,
        int $totalAmount,
        string $purchasedAt,
        string $status,
        int $itemQuantity,
        string $itemTitle,
        string $itemSku,
        string $itemImageUrl
    ) {
        $this->orderNo = $orderNo;
        $this->totalAmount = $totalAmount;
        $this->purchasedAt = $purchasedAt;
        $this->status = $status;
        $this->itemQuantity = $itemQuantity;
        $this->itemTitle = $itemTitle;
        $this->itemSku = $itemSku;
        $this->itemImageUrl = $itemImageUrl;
    }

    public function toArray(): array
    {
        return [
            'orderNo' => $this->orderNo,
            'totalAmount' => $this->totalAmount,
            'purchasedAt' => $this->purchasedAt,
            'status' => $this->status,
            'itemQuantity' => $this->itemQuantity,
            'itemTitle' => $this->itemTitle,
            'itemSku' => $this->itemSku,
            'itemImageUrl' => $this->itemImageUrl
        ];
    }
    // private int $orderNo;
    // private string $purchasedAt;
    // private string $title;
    // private string $sku;
    // private string $picUrl;
    // private int $priceAmount;
    // private int $quantity;
    // private string $status;

    // public function __construct(OrderInfo $orderInfo, OrderItem $orderItem)
    // {
    //     $this->orderNo = $orderInfo->getOrderNo();
    //     $this->purchasedAt = $orderInfo->getPurchasedAt();
    //     $this->title = $orderItem->getProductName();
    //     $this->sku = $orderItem->getProductSku();
    //     $this->picUrl = $orderItem->getProductPicUrl();
    //     $this->priceAmount = $orderInfo->getPriceAmount();
    //     $this->quantity = $orderInfo->getTotalQuantity();
    //     $this->status = $orderInfo->getStatus();
    // }

    // public function getOrderNo(): int
    // {
    //     return $this->orderNo;
    // }

    // public function getPurchasedAt(): string
    // {
    //     return $this->purchasedAt;
    // }

    // public function getTitle(): string
    // {
    //     return $this->title;
    // }

    // public function getSku(): string
    // {
    //     return $this->sku;
    // }

    // public function getPicUrl(): string
    // {
    //     return $this->picUrl;
    // }

    // public function getPriceAmount(): int
    // {
    //     return $this->priceAmount;
    // }

    // public function getQuantity(): int
    // {
    //     return $this->quantity;
    // }

    // public function getStatus(): string
    // {
    //     return $this->status;
    // }
}
