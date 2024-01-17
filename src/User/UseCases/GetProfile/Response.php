<?php

namespace Etore\User\UseCases\GetProfile;

use Etore\User\Entites\User;

class Response
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function format(): array
    {
        return [
            'data' => [
                'id' => $this->user->getId(),
                'email' => $this->user->getEmail(),
                'password' => $this->user->getPassword(),
                'nickname' => $this->user->getNickname(),
                'avatarUrl' => $this->user->getAvatarUrl()
            ]
        ];
    }
}
