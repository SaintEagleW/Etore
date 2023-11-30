<?php

namespace Etore\Order\UseCases\GetOrderDetail;

use Etore\Order\Exception\ErrorCode;
use Etore\Order\Exception\OrderException;
use Etore\Utils\DataValidator;

class Request
{
    private const SCHEMA = [
        'token' => 'bail|required|string',
        'orderId' => 'bail|required|int'
    ];

    private $token;
    private $orderId;

    public function __construct(array $data)
    {
        $this->validate($data);
        $this->format($data);
    }

    private function validate(array $data): void
    {
        $validator = new DataValidator();

        if (!$validator->isPass($data, self::SCHEMA)) {
            throw new OrderException(ErrorCode::MissingRequiredData);
        }
    }

    private function format(array $data): void
    {
        $this->token = $data['token'];
        $this->orderId = $data['orderId'];
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function getOrderId(): int
    {
        return $this->orderId;
    }
}
