<?php

namespace Etore\Commodity\Exception;

use Etore\EtoreException;

class CommodityException extends EtoreException
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
