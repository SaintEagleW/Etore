<?php

namespace Etore\Coupon\UseCases\GetCoupon;

use Etore\Utils\DataValidator;
use Etore\Coupon\Exception\ErrorCode;
use Etore\Coupon\Exception\CouponException;

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
            throw new CouponException(ErrorCode::MissingToken);
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
