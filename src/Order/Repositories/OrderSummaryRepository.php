<?php

namespace Etore\Order\Repositories;

use App\Models\Order as OrderModel;
use App\Models\OrderItem as OrderItemModel;
use Etore\Order\Entities\OrderSummary;
use Illuminate\Support\Facades\DB;

class OrderSummaryRepository
{
    public function getSummaries(int $userId): array
    {
        $rows = OrderModel::select(
            'order.id',
            'order.purchased_at',
            'order.status',
            'order.payment',
            'commodity.product_name',
            'commodity.sku',
            'commodity.product_pic_url',
            DB::raw('COUNT(1) as count')
        )
            ->join('order_item', 'order_item.order_id', '=', 'order.id')
            ->join('commodity', 'commodity.id', '=', 'order_item.product_id')
            ->where('order.user_id', '=', $userId)
            ->groupBy('order_item.order_id')
            ->get()
            ->toArray();

        return array_map(function ($row) {
            return new OrderSummary(
                $row['id'],
                $row['payment'],
                $row['purchased_at'],
                $row['status'],
                $row['count'],
                $row['product_name'],
                $row['sku'],
                $row['product_pic_url']
            );
        }, $rows);
    }
}
