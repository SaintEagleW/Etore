<?php

namespace Etore\User\UseCases\Logout;

use Etore\User\Repositories\UserTokenRepository;

class UseCase
{
    private UserTokenRepository $userTokenRepository;

    public function __construct()
    {
        $this->userTokenRepository = new UserTokenRepository();
    }

    public function execute(?string $token)
    {
        if (is_null($token)) {
            return ['code' => 1, 'message' => '您尚未登入。'];
        }

        $this->userTokenRepository->delete($token);
        return ['code' => 0, 'message' => '已成功登出。'];
    }
}
