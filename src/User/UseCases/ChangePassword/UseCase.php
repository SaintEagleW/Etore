<?php

namespace Etore\User\UseCases\ChangePassword;

use Etore\User\Repositories\UserRepository;
use Etore\User\Repositories\UserTokenRepository;

class UseCase
{
    private UserRepository $userRepository;
    private UserTokenRepository $userTokenRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->userTokenRepository = new UserTokenRepository();
    }

    public function execute(?string $token, string $password, string $passwordConfirm): array
    {
        if (!$this->isLogin($token)) {
            return ['code' => 1, 'message' => '您尚未登入，請登入後再操作。'];
        } elseif (!$this->isPasswordMatch($password, $passwordConfirm)) {
            return ['code' => 2, 'message' => '密碼不相符，請重新輸入。'];
        }

        $this->changePassword($token, $password);
        return ['code' => 0, 'message' => '密碼變更成功，請重新登入。'];
    }

    private function isPasswordMatch(string $password, string $passwordConfirm): bool
    {
        return $password === $passwordConfirm;
    }

    private function isLogin(?string $token): bool
    {
        if (is_null($token)) {
            return false;
        } elseif (is_null($this->userTokenRepository->getUserId($token))) {
            return false;
        }

        return true;
    }

    private function changePassword(string $token, string $password): void
    {
        $userId = $this->userTokenRepository->getUserId($token);
        $user = $this->userRepository->getUserById($userId);
        $user->updatePassword($password);
        $this->userRepository->updateUser($user);
        $this->userTokenRepository->delete($token);
    }
}
