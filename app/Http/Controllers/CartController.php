<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Etore\Cart\UseCases\AddToCart\UseCase as AddToCartUseCase;
use Etore\Cart\UseCases\Cart\UseCase as CartUseCase;
use Etore\Cart\UseCases\CountPrice\UseCase as CountPriceUseCase;
use Etore\Cart\UseCases\DeleteFromCart\UseCase as DeleteFromCartUseCase;
use Etore\Cart\UseCases\UpdateItem\UseCase as UpdateItemUseCase;
use Etore\Cart\UseCases\UpdateItems\UseCase as UpdateItemsUseCase;

class CartController
{
    public function addToCart(Request $request)
    {
        $token = $request->cookie('token');
        $productId = $request->input('productId');
        $quantity = $request->input('quantity');
        $useCase = new AddToCartUseCase();

        $result = $useCase->execute($token, $productId, $quantity);

        return response()->json($result);
    }

    public function getItems(Request $request)
    {
        $token = $request->cookie('token');
        $useCase = new CartUseCase();
        $result = $useCase->execute($token);

        return response()->json($result);
    }

    public function deleteFromCart(Request $request)
    {
        $token = $request->cookie('token');
        $productId = $request->get('productId');
        $useCase = new DeleteFromCartUseCase();
        $result = $useCase->execute($token, $productId);

        return response()->json($result);
    }

    public function updateItem(Request $request)
    {
        $token = $request->cookie('token');
        $productId = $request->input('productId');
        $quantity = $request->input('quantity');
        $isChecked = $request->input('isChecked') === true ? 1 : 0;
        $useCase = new UpdateItemUseCase();
        $result = $useCase->execute($token, $productId, $quantity, $isChecked);

        return $result;
    }

    public function updateItems(Request $request)
    {
        $token = $request->cookie('token');
        $isChecked = $request->input('isChecked') === true ? 1 : 0;
        $useCase = new UpdateItemsUseCase();
        $result = $useCase->execute($token, $isChecked);

        return $result;
    }

    public function countPrice(Request $request)
    {
        $token = $request->cookie('token');
        $useCase = new CountPriceUseCase();
        $result = $useCase->execute($token);

        return $result;
    }
}
