<?php

namespace App\Http\Controllers;

use Etore\Order\Exception\OrderException;
use Etore\Order\Repositories\OrderRepository;
use Etore\Order\Repositories\OrderSummaryRepository;
use Illuminate\Http\Request;
use Etore\Order\UseCases\CreateOrder\UseCase as CreateOrderUseCase;
use Etore\Order\UseCases\CreateOrder\Request as CreateOrderRequest;
use Etore\Order\UseCases\GetOrderDetail\Request as GetOrderDetailRequest;
use Etore\Order\UseCases\GetOrderDetail\UseCase as GetOrderDetailUseCase;
use Etore\Order\UseCases\GetOrderList\Request as GetOrderListRequest;
use Etore\Order\UseCases\GetOrderList\UseCase as GetOrderListUseCase;

use Throwable;

class OrderController
{
    public function createOrder(Request $request)
    {
        try {
            $req = new CreateOrderRequest([
                'token' => $request->cookie('token'),
                'customerName' => $request->input('buyerName'),
                'customerPhoneNumber' => $request->input('buyerPhone'),
                'customerAddress' => $request->input('buyerAdd'),
                'deliveryMethod' => $request->input('shipMethod'),
                'paymentMethod' => $request->input('payMethod')
            ]);
            $useCase = new CreateOrderUseCase();
            $response = $useCase->execute($req);
            return response()->json($response->format())->setStatusCode(200);
        } catch (OrderException $e) {
            return response()->json($e->format())->setStatusCode($e->getStatusCode());
        } catch (Throwable $th) {
            return response()->json(['errors' => ['code' => 9999, 'msg' => '系統錯誤']])->setStatusCode(500);
        }
    }

    public function getOrderList(Request $request)
    {
        try {
            $req = new GetOrderListRequest(['token' => $request->cookie('token')]);
            $useCase = new GetOrderListUseCase();
            $response = $useCase->execute($req);
            return response()->json($response->format());
        } catch (OrderException $e) {
            return response()->json($e->format())->setStatusCode($e->getStatusCode());
        } catch (Throwable $th) {
            print_r($th->getTrace());
            return response()->json(['errors' => ['code' => 9999, 'msg' => '系統錯誤']])->setStatusCode(500);
        }
    }

    public function getOrderDetail(Request $request, int $id)
    {
        try {
            $req = new GetOrderDetailRequest(['token' => $request->cookie('token'), 'orderId' => $id]);
            $useCase = new GetOrderDetailUseCase();
            $response = $useCase->execute($req);
            return response()->json($response->format());
        } catch (OrderException $e) {
            return response()->json($e->format())->setStatusCode($e->getStatusCode());
        } catch (Throwable $th) {
            return response()->json(['errors' => ['code' => 9999, 'msg' => '系統錯誤']])->setStatusCode(500);
        }
    }
}
