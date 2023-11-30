<?php

namespace Etore\Cart\Repositories;

use App\Models\CartItem as CartItemModel;
use Etore\Cart\Entities\CartItem;

class CartRepository
{
    public function getItems(int $userId): array
    {
        $rows = CartItemModel::where('user_id', $userId)
            ->get()
            ->toArray();

        return array_map(function ($row) {
            return new CartItem(
                $row['user_id'],
                $row['product_id'],
                $row['quantity'],
                $row['is_checked'],
                $row['id']
            );
        }, $rows);
    }

    public function getCheckedItems(int $userId): array
    {
        $rows = CartItemModel::where('user_id', $userId)
            ->where('is_checked', '1')
            ->get()
            ->toArray();

        return array_map(function ($row) {
            return new CartItem(
                $row['user_id'],
                $row['product_id'],
                $row['quantity'],
                $row['is_checked'],
                $row['id']
            );
        }, $rows);
    }

    public function getItem(int $userId, int $productId): array
    {
        $item = CartItemModel::where('user_id', $userId)->where('product_id', $productId)->first();

        return $item->toArray();
    }

    public function deleteItems(int $userId, int $productId): void
    {
        $row = CartItemModel::where('user_id', $userId)->where('product_id', $productId)->first();

        $row->delete();
    }

    public function updateItem(CartItem $cartItem): void
    {
        $row = CartItemModel::where('product_id', $cartItem->getProductId())->where('user_id', $cartItem->getUserId())->first();

        $row->quantity = $cartItem->getQuantity();
        $row->is_checked = $cartItem->getIsChecked();
        $row->save();
    }

    public function addItem(CartItem $cartItem)
    {
        $row = new CartItemModel();
        $row->user_id = $cartItem->getUserId();
        $row->product_id = $cartItem->getProductId();
        $row->quantity = $cartItem->getQuantity();
        $row->is_checked = 1;
        $row->save();
    }

    public function getCheckoutItems(int $userId): array
    {
        $collection = CartItemModel::where('user_id', $userId)->where('is_checked', 1)->get();

        return $collection->toArray();
    }
}
