<?php

namespace App\Http\Controllers;

use Etore\Coupon\Entites\Coupon;
use Etore\Coupon\Exception\CouponException;
use Etore\Coupon\UseCases\CreatCoupon\UseCase as CreatCouponUseCase;
use Etore\Coupon\UseCases\GetCoupon\UseCase as GetCouponUseCase;
use Etore\Coupon\UseCases\GetCoupon\Request as GetCouponRequest;
use Illuminate\Http\Request;
use Throwable;

class CouponController
{
    public function getCoupon(Request $request)
    {
        try {
            $req = new GetCouponRequest(['token' => $request->cookie('token')]);
            $useCase = new GetCouponUseCase();
            $response = $useCase->execute($req);
            return response()->json($response->format());
        } catch (CouponException $e) {
            return response()->json($e->format())->setStatusCode($e->getStatusCode());
        } catch (Throwable $th) {
            return response()->json(['errors' => ['code' => 9999, 'msg' => '系統錯誤']])->setStatusCode(500);
        }
    }

    public function creatCoupon(Request $request)
    {
        $title = $request->input('title');
        $desc = $request->input('desc');
        $code = $request->input('code');
        $type = $request->input('type');
        $status = $request->input('status');
        $discount = $request->input('discount');
        $userId = $request->input('userId');
        $startedAt = $request->input('startedAt');
        $expiredAt = $request->input('expiredAt');

        $useCase = new CreatCouponUseCase();
        $result = $useCase->execute(
            $title,
            $desc,
            $code,
            $type,
            $discount,
            $status,
            $userId,
            $startedAt,
            $expiredAt
        );

        return response()->json($result);
    }
}
