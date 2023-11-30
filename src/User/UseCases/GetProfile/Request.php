<?php

namespace Etore\User\UseCases\GetProfile;

use Etore\Utils\DataValidator;
use Etore\User\Exception\ErrorCode;
use Etore\User\Exception\UserException;

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
            throw new UserException(ErrorCode::MissingToken);
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
