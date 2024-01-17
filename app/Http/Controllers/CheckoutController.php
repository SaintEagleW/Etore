<?php

namespace App\Http\Controllers;

use Etore\Counter\UseCases\Checkout\UseCase as CheckoutUseCase;
use Illuminate\Http\Request;

class CheckoutController
{
    public function getItems(Request $request)
    {
        $token = $request->cookie('token');
        $useCase = new CheckoutUseCase();
        $result = $useCase->execute($token);

        return response()->json($result);
    }
}
