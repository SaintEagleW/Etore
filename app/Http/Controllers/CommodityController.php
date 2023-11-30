<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Etore\Commodity\UseCases\GetCommodity\UseCase as GetCommodityUseCase;
use Etore\Commodity\UseCases\GetCommodities\UseCase as GetCommoditiesUseCase;
use Etore\Commodity\UseCases\GetCommodity\Request as GetCommodityRequest;
use Etore\Commodity\Exception\CommodityException;
use Throwable;

class CommodityController
{
    public function getCommodities()
    {
        try {
            $useCase = new GetCommoditiesUseCase();
            $response = $useCase->execute();
            return response()->json($response->format())->setStatusCode(200);
        } catch (Throwable $th) {
            return response()->json(['errors' => ['code' => 9999, 'msg' => '系統錯誤']]);
        }
    }

    public function commodity(Request $request)
    {
        try {
            $req = new GetCommodityRequest(['productId' => $request->get('productId')]);
            $useCase = new GetCommodityUseCase();
            $response = $useCase->execute($req);
            return response()->json($response->format())->setStatusCode(200);
        } catch (CommodityException $e) {
            return response()->json($e->format())->setStatusCode($e->getStatusCode());
        } catch (Throwable $th) {
            return response()->json(['errors' => ['code' => 9999, 'msg' => '系統錯誤']])->setStatusCode(500);
        }
    }

    public function getCommodity(int $id)
    {
        try {
            $request = new GetCommodityRequest(['commodityId' => $id]);
            $useCase = new GetCommodityUseCase();
            $response = $useCase->execute($request);
            return response()->json($response->format())->setStatusCode(200);
        } catch (CommodityException $e) {
            return response()->json($e->format())->setStatusCode($e->getStatusCode());
        } catch (Throwable $th) {
            return response()->json(['errors' => ['code' => 9999, 'msg' => '系統錯誤']])->setStatusCode(500);
        }
    }
}
