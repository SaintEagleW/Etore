<?php

namespace Etore\Coupon\Exception;

use Etore\EtoreException;

class CouponException extends EtoreException
{
    private ErrorCode $errorCode;

    public function __construct(ErrorCode $errorCode)
    {
        $this->errorCode = $errorCode;
        parent::__construct($errorCode->getErrorMessage(), $errorCode->value);
    }

    public function getStatusCode(): int
    {
        return $this->errorCode->getStatusCode();
    }
}
