<?php

namespace Etore\User\UseCases\EditProfile;

use Etore\User\Exception\ErrorCode;
use Etore\User\Exception\UserException;
use Etore\Utils\DataValidator;

class Request
{
    private const SCHEMA = [
        'token' => 'bail|required|string',
        'nickname' => 'bail|required|string',
        'avatarUrl' => 'bail|required|string'
    ];
    private string $token;
    private string $nickname;
    private string $avatarUrl;

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
        $this->nickname = $data['nickname'];
        $this->avatarUrl = $data['avatarUrl'];
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function getNickname(): string
    {
        return $this->nickname;
    }

    public function getAvatarUrl(): string
    {
        return $this->avatarUrl;
    }
}
