<?php

namespace Etore\Order\Entities;

use Etore\Commodity\Entities\Commodity;
use Etore\Order\ValueObjects\Customer;
use Etore\Order\ValueObjects\Delivery;
use Etore\Order\ValueObjects\Payment;
use Etore\Order\ValueObjects\OrderItem;

class OrderBuilder
{
    private array $data;
    private Order $order;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function build(): self
    {
        $this->order = new Order(
            $this->data['id'],
            $this->data['purchased_at'],
            $this->buildCustomer(),
            $this->buildPayment(),
            $this->buildDelivery(),
            $this->buildItems()
        );
        return $this;
    }

    private function buildCustomer(): Customer
    {
        return new Customer($this->data['buyer_name'], $this->data['buyer_phone'], $this->data['buyer_add']);
    }

    private function buildPayment(): Payment
    {
        return new Payment($this->data['pay_method'], $this->data['payment']);
    }

    private function buildDelivery(): Delivery
    {
        return new Delivery($this->data['ship_method'], $this->data['status']);
    }

    private function buildItems(): array
    {
        return array_map(function (array $row) {
            $commodity = new Commodity(
                $row['id'],
                $row['price'],
                $row['product_name'] . ' ' . $row['sku'],
                $row['desc'],
                $row['product_pic_url']
            );
            return new OrderItem($commodity, $row['product_price'], $row['quantity']);
        }, $this->data['items']);
    }

    public function getOrder(): Order
    {
        return $this->order;
    }
}
