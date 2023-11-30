<?php

namespace Etore\Order\UseCases\GetOrderDetail;

use Etore\Order\Exception\ErrorCode;
use Etore\Order\Exception\OrderException;
use Etore\Order\Repositories\OrderRepository;
use Etore\User\Repositories\UserRepository;

class UseCase
{
    private OrderRepository $orderRepository;
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->orderRepository = new OrderRepository();
        $this->userRepository = new UserRepository();
    }

    public function execute(Request $request): Response
    {
        $token = $request->getToken();
        $user = $this->userRepository->getUserByToken($token);

        if (is_null($user)) {
            throw new OrderException(ErrorCode::UserNotFound);
        }

        $order = $this->orderRepository->getUserOrder($user->getId(), $request->getOrderId());

        if (is_null($order)) {
            throw new OrderException(ErrorCode::OrderNotFound);
        }

        return new Response($order);
    }
}
