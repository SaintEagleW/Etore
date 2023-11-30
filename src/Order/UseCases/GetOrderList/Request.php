<?php

namespace Etore\Order\UseCases\GetOrderList;

use Etore\Order\Exception\OrderException;
use Etore\Order\Exception\ErrorCode;
use Etore\Utils\DataValidator;

class Request
{
    private const SCHEMA = [
        'token' => 'bail|required|string'
    ];

    private string $token;

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
    }

    public function getToken(): string
    {
        return $this->token;
    }
}
