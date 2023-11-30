<?php

namespace Etore\User\UseCases\Login;

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

    public function execute($email, $password): array
    {
        $user = $this->userRepository->getUserByEmail($email);
        if (is_null($user)) {
            return ['code' => 1, 'message' => '帳號不存在'];
        } elseif (!$this->isPasswordCorrect($password, $user->getPassword())) {
            return ['code' => 2, 'message' => '密碼不正確'];
        }

        $token = $this->createUserToken($user);
        return ['code' => 0, 'token' => $token];
    }

    private function isPasswordCorrect($loginPassword, $userPassword): bool
    {
        return $loginPassword === $userPassword;
    }

    private function createUserToken($user): string
    {
        $token = $user->generateToken();
        $this->userTokenRepository->insert($token, $user->getId());

        return $token;
    }
}
