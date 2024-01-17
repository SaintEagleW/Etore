<?php

namespace Etore\Order\Repositories;

use App\Models\Commodity as CommodityModel;
use App\Models\OrderItem as OrderItemModel;
use Etore\Commodity\Entities\Commodity;
use Etore\Commodity\Entities\CommodityFactory;
use Etore\Order\Entities\OrderItem;

class OrderItemRepository
{
    private CommodityFactory $commodityFactory;

    public function __construct()
    {
        $this->commodityFactory = new CommodityFactory();
    }

    public function add(OrderItem $orderItem): int
    {
        $row = new OrderItemModel();

        $row->order_id = 0;
        $row->user_id = $orderItem->getUserId();
        $row->product_id = $orderItem->getProductId();
        $row->product_price = $orderItem->getProductPrice();
        $row->quantity = $orderItem->getQuantity();

        $row->save();
        $id = $row->id;

        return $id;
    }

    public function getFirst(int $orderId): OrderItem
    {
        $orderRow = OrderItemModel::where('order_id', $orderId)->first();
        $commodityRow = CommodityModel::where('id', $orderRow->product_id)->first();

        $product = $this->commodityFactory->createCommodity($commodityRow);

        $orderItem = new OrderItem(
            $orderRow->user_id,
            $product,
            $orderRow->quantity,
            $orderRow->id
        );

        return $orderItem;
    }

    public function getAll(int $orderId): array
    {
        $collection = OrderItemModel::where('order_id', $orderId)->get();
        $orderItems = [];
        foreach ($collection as $row) {
            $orderItem = new OrderItem(
                $row->user_id,
                $row->product_id,
                $row->product_price,
                $row->quantity,
                $row->id
            );
            $orderItems[] = $orderItem;
        }

        return $orderItems;
    }

    public function updateOrderId(int $id, int $orderId): void
    {
        $row = OrderItemModel::where('id', $id)->first();
        $row->order_id = $orderId;
        $row->save();
    }
}
