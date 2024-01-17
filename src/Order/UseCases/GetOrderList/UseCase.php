<?php

namespace Etore\Order\UseCases\GetOrderList;

use Etore\Order\Exception\OrderException;
use Etore\Order\Repositories\OrderRepository;
use Etore\User\Repositories\UserRepository;
use Etore\Order\Exception\ErrorCode;

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

        $orders = $this->orderRepository->getUserOrders($user->getId());
        return new Response($orders);
    }
}
