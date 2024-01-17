<?php

namespace Etore\User\UseCases\GetProfile;

use Etore\User\Exception\ErrorCode;
use Etore\User\Exception\UserException;
use Etore\User\Repositories\UserRepository;

class UseCase
{
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function execute(Request $request): Response
    {
        $token = $request->getToken();
        $user = $this->userRepository->getUserByToken($token);

        if (is_null($user)) {
            throw new UserException(ErrorCode::UserNotFound);
        }

        return new Response($user);
    }
}
