<?php

namespace Etore\User\Exception;

use Etore\EtoreException;

class UserException extends EtoreException
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

    // private const CODE_USER_NOT_FOUND = 1001;
    // private const CODE_USER_TOKEN_MISSING = 1002;

    // public static function createUserNotFoundException(): self
    // {
    //     return new UserException('user not found', self::CODE_USER_NOT_FOUND);
    // }

    // public static function createMissingUserToken(): self
    // {
    //     return new UserException('user token missing', self::CODE_USER_TOKEN_MISSING);
    // }

    // private function __construct(string $message, int $code)
    // {
    //     parent::__construct($message, $code);
    // }

}
