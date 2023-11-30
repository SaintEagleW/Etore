<?php

namespace Etore\Order\Exception;

use Etore\EtoreException;

class OrderException extends EtoreException
{
    private ErrorCode $errorCode;

    public function __construct(ErrorCode $errorCode, string $custom_message = '')
    {
        $this->errorCode = $errorCode;
        parent::__construct($errorCode->getErrorMessage() . ', ' . $custom_message, $errorCode->value);
    }

    public function getStatusCode(): int
    {
        return $this->errorCode->getStatusCode();
    }
}
