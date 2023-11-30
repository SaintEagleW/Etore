<?php

namespace Etore\Order\UseCases\CreateOrder;

use Etore\Cart\Repositories\CartRepository;
use Etore\Order\Entities\Order;
use Etore\Order\Exception\OrderException;
use Etore\Order\Exception\ErrorCode;
use Etore\Order\Repositories\OrderItemRepository;
use Etore\Order\Repositories\OrderRepository;
use Etore\Order\ValueObjects\Customer;
use Etore\Order\ValueObjects\Delivery;
use Etore\Order\ValueObjects\OrderItem;
use Etore\Order\ValueObjects\OrderItemFactory;
use Etore\Order\ValueObjects\Payment;
use Etore\User\Repositories\UserRepository;
use Throwable;

class UseCase
{
    private CartRepository $cartRepository;
    private OrderRepository $orderRepository;
    private OrderItemRepository $orderItemRepository;
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->cartRepository = new CartRepository();
        $this->orderRepository = new OrderRepository();
        $this->orderItemRepository = new OrderItemRepository();
        $this->userRepository = new UserRepository();
    }

    public function execute(Request $request): Response
    {
        $user = $this->userRepository->getUserByToken($request->getToken());
        if (is_null($user)) {
            throw new OrderException(ErrorCode::UserNotFound);
        }

        $cartItems = $this->cartRepository->getCheckedItems($user->getId());

        $orderItemFactory = new OrderItemFactory();
        $orderItems = array_map(function ($cartItem) use ($orderItemFactory) {
            return $orderItemFactory->createOrderItem($cartItem);
        }, $cartItems);

        $customer = new Customer(
            $request->getCustomerName(),
            $request->getCustomerPhoneNumber(),
            $request->getCustomerAddress()
        );

        $amount = array_reduce($orderItems, function ($total, OrderItem $orderItem) {
            return $total + $orderItem->getSubtotal();
        }, 0);
        $payment = new Payment($request->getPaymentMethod(), $amount);
        $delivery = new Delivery($request->getDeliveryMethod(), 'preparing');

        $order = new Order(
            -1,
            now()->toDateTimeString(),
            $customer,
            $payment,
            $delivery,
            $orderItems
        );

        $this->createOrder(
            $user->getId(),
            $order
        );
        $this->clearCart($user->getId(), $cartItems);

        return new Response();
    }

    private function createOrder(
        int $userId,
        Order $order
    ) {
        // $payment = 0;
        // foreach ($cartItems as $cartItem) {
        //     $commodity = $this->commodityRepository->get($cartItem->getProductId());
        //     // $price = $this->commodityRepository->get($commodityId)->getPrice();
        //     // $payment += $price * $cartItem['quantity'];
        //     $orderItems[] = new OrderItem($userId, $commodity, $cartItem->getQuantity());
        // }
        // );
        $this->orderRepository->add($order, $userId);

        // foreach ($order->getItems() as $orderItem) {
        //     $id = $this->orderItemRepository->add($orderItem);
        //     $this->orderItemRepository->updateOrderId($id, $orderId);
        // }
    }

    private function clearCart(int $userId, array $cartItems)
    {
        foreach ($cartItems as $cartItem) {
            if ($cartItem->getIsChecked() === 0) {
                continue;
            }
            $commodityId = $cartItem->getProductId();
            $this->cartRepository->deleteItems($userId, $commodityId);
        }
    }
}
