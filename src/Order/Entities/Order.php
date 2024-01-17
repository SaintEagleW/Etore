<?php

namespace Etore\Order\Entities;

use Etore\Order\ValueObjects\Customer;
use Etore\Order\ValueObjects\Delivery;
use Etore\Order\ValueObjects\Payment;
use Etore\Order\ValueObjects\OrderItem;

class Order
{
    private int $id;
    private string $purchasedAt;
    private Customer $customer;
    private Payment $payment;
    private Delivery $delivery;
    private array $items;

    public function __construct(
        int $id,
        string $purchasedAt,
        Customer $customer,
        Payment $payment,
        Delivery $delivery,
        array $items
    ) {
        $this->id = $id;
        $this->purchasedAt = $purchasedAt;
        $this->customer = $customer;
        $this->payment = $payment;
        $this->delivery = $delivery;
        $this->items = $items;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getPurchasedAt(): string
    {
        return $this->purchasedAt;
    }

    public function getCustomerName(): string
    {
        return $this->customer->getName();
    }

    public function getCustomerPhoneNumber(): string
    {
        return $this->customer->getPhoneNumber();
    }

    public function getCustomerAddress(): string
    {
        return $this->customer->getAddress();
    }

    public function getDeliveryMethod(): string
    {
        return $this->delivery->getMethod();
    }

    public function getDeliveryStatus(): string
    {
        return $this->delivery->getStatus();
    }

    public function getPaymentMethod(): string
    {
        return $this->payment->getMethod();
    }

    public function countItems(): int
    {
        return count($this->items);
    }

    public function getFirstItemTitle(): string
    {
        return $this->items[0]->getCommodityTitle();
    }

    public function getFirstItemImageUrl(): string
    {
        return $this->items[0]->getCommodityImageUrl();
    }

    public function getTotal(): int
    {
        return array_reduce($this->items, function (int $total, OrderItem $item) {
            return $total + $item->getSubtotal();
        }, 0);
    }

    public function getDetail(): array
    {
        return array_map(function (OrderItem $item) {
            return [
                'commodityImageUrl' => $item->getCommodityImageUrl(),
                'commodityTitle' => $item->getCommodityTitle(),
                'commodityDescription' => $item->getCommodityDescription(),
                'subtotal' => $item->getSubtotal(),
                'quantity' => $item->getQuantity()
            ];
        }, $this->items);
    }

    public function getItems(): array
    {
        return $this->items;
    }
}
