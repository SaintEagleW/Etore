<?php

namespace Etore\Order\Repositories;

use App\Models\Order as OrderModel;
use App\Models\OrderItem as OrderItemModel;
use Etore\Order\Entities\Order;
use Etore\Order\Entities\OrderBuilder;

class OrderRepository
{
    public function getUserOrder(int $userId, int $orderId): ?Order
    {
        $order = OrderModel::where('user_id', $userId)
            ->where('id', $orderId)
            ->first();

        if (is_null($order)) {
            return null;
        }

        $orderItems = OrderItemModel::select(
            'order_item.order_id',
            'order_item.product_price',
            'order_item.quantity',
            'commodity.*'
        )
            ->join('commodity', 'commodity.id', '=', 'order_item.product_id')
            ->where('order_id', $order->id)
            ->get();

        $data = $order->toArray();
        $data['items'] = $orderItems->toArray();

        return (new OrderBuilder($data))
            ->build()
            ->getOrder();
    }

    public function getUserOrders(int $userId): array
    {
        $orders = OrderModel::where('user_id', $userId)->get();
        $orderItems = OrderItemModel::select(
            'order_item.order_id',
            'order_item.product_price',
            'order_item.quantity',
            'commodity.*'
        )
            ->join('commodity', 'commodity.id', '=', 'order_item.product_id')
            ->whereIn('order_id', $orders->pluck('id'))
            ->get()
            ->groupBy('order_id')
            ->toArray();

        return array_map(function ($order) use ($orderItems) {
            $order['items'] = $orderItems[$order['id']];
            return (new OrderBuilder($order))
                ->build()
                ->getOrder();
        }, $orders->toArray());
    }

    // public function getAll(int $userId): array
    // {
    //     $collection = OrderModel::where('user_id', $userId)->get();
    //     $orders = [];

    //     foreach ($collection as $row) {
    //         $order = new Order(
    //             $row->user_id,
    //             $row->payment,
    //             [],
    //             $row->buyer_name,
    //             $row->buyer_phone,
    //             $row->buyer_add,
    //             $row->ship_method,
    //             $row->pay_method,
    //             $row->status,
    //             $row->id
    //         );
    //         // $order->updatePurchasedAt($row->purchased_at);
    //         $orders[] = $order;
    //     }
    //     return $orders;
    // }

    public function add(Order $order, int $userId): void
    {
        $orderRow = new OrderModel();

        $orderRow->user_id = $userId;
        $orderRow->buyer_name = $order->getCustomerName();
        $orderRow->buyer_phone = $order->getCustomerPhoneNumber();
        $orderRow->buyer_add = $order->getCustomerAddress();
        $orderRow->ship_method = $order->getDeliveryMethod();
        $orderRow->payment = $order->getTotal();
        $orderRow->pay_method = $order->getPaymentMethod();
        $orderRow->status = $order->getDeliveryStatus();
        $orderRow->purchased_at = $order->getPurchasedAt();
        $orderRow->save();
        $orderId = $orderRow->id;

        foreach ($order->getItems() as $orderItem) {
            $orderItemRow = new OrderItemModel();
            $orderItemRow->order_id = $orderId;
            $orderItemRow->user_id = $userId;
            $orderItemRow->product_id = $orderItem->getCommodityId();
            $orderItemRow->product_price = $orderItem->getAmount();
            $orderItemRow->quantity = $orderItem->getQuantity();
            $orderItemRow->save();
        }
        exit;
    }
}
