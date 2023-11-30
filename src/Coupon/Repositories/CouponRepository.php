<?php

namespace Etore\Coupon\Repositories;

use App\Models\Coupon as CouponModel;
use Etore\Coupon\Entities\Coupon;

class CouponRepository
{
    public function get(int $userId): array
    {
        $collection = CouponModel::where('user_id',  $userId)->get();
        $coupons = [];

        foreach ($collection as $row) {
            $coupon = new Coupon(
                $row->title,
                $row->desc,
                $row->code,
                $row->type,
                $row->discount,
                $row->status,
                $row->user_id,
                $row->started_at,
                $row->expired_at,
                $row->id
            );
            $coupons[] = $coupon;
        }

        return $coupons;
    }

    public function add(Coupon $coupon)
    {
        $row = new CouponModel();
        $row->title = $coupon->getTitle();
        $row->desc = $coupon->getDesc();
        $row->code = $coupon->getCode();
        $row->type = $coupon->getType();
        $row->discount = $coupon->getDiscount();
        $row->status = $coupon->getStatus();
        $row->user_id = $coupon->getUserId();
        $row->created_at = $coupon->getCreatedAt();
        $row->started_at = $coupon->getStartedAt();
        $row->expired_at = $coupon->getExpiredAt();
        $row->save();
    }
}
