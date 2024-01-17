<?php

namespace Etore\User\UseCases\ResetPassword;

use Etore\User\Repositories\UserRepository;

class UseCase
{
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function execute(string $email, string $password, string $passwordConfirm): array
    {
        if (!$this->isUserExist($email)) {
            return ['code' => 1, 'message' => '帳號不存在，請重新輸入。'];
        } elseif (!$this->isPasswordMatch($password, $passwordConfirm)) {
            return ['code' => 2, 'message' => '密碼不相符，請重新輸入。'];
        }

        $this->resetPassword($email, $password);
        return ['code' => 0, 'message' => '密碼變更成功，請重新登入。'];
    }

    private function isPasswordMatch(string $password, string $passwordConfirm): bool
    {
        return $password === $passwordConfirm;
    }

    private function isUserExist(string $email): bool
    {
        if (is_null($this->userRepository->getUserByEmail($email))) {
            return false;
        }

        return true;
    }

    private function resetPassword(string $email, string $password): void
    {
        $user = $this->userRepository->getUserByEmail($email);
        $user->updatePassword($password);
        $this->userRepository->updateUser($user);
    }
}
