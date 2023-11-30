<?php

namespace Etore\Coupon\UseCases\UseCoupon;

use Etore\Coupon\Exception\CouponException;
use Etore\Coupon\Exception\ErrorCode;
use Etore\Utils\DataValidator;

class Request
{
    private const SCHEMA = [
        'token' => 'bail|required|string',
        'code' => 'bail|required|string'
    ];
    private string $token;
    private string $code;

    public function __construct(array $data)
    {
        $this->validate($data);
        $this->format($data);
    }

    private function validate(array $data): void
    {
        $validator = new DataValidator();
        if (!$validator->isPass($data, self::SCHEMA)) {
            throw new CouponException(ErrorCode::MissingRequiredData);
        }
    }

    private function format(array $data): void
    {
        $this->token = $data['token'];
        $this->code = $data['code'];
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function getCode(): string
    {
        return $this->code;
    }
}
