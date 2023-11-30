<?php

namespace Etore\User\Repositories;

use App\Models\User as UserModel;
use Etore\User\Entites\User;

class UserRepository
{
    public function getUserByEmail(string $email): ?User
    {
        $row = UserModel::where('email', $email)->first();

        if (is_null($row)) {
            return null;
        }

        $user = new User(
            $row->email,
            $row->password,
            $row->id,
            $row->nickname,
            $row->avatar_url
        );

        return $user;
    }

    public function getUserById(int $userId): ?User
    {
        $row = UserModel::where('id', $userId)->first();

        if (is_null($row)) {
            return null;
        }

        $user = new User(
            $row->email,
            $row->password,
            $row->id,
            $row->nickname,
            $row->avatar_url
        );

        return $user;
    }

    public function getUserByToken(string $token): ?User
    {
        $row = UserModel::select('user.*')
            ->join('user_token', 'user_token.user_id', '=', 'user.id')
            ->where('user_token.token', '=', $token)
            ->first();

        if (is_null($row)) {
            return null;
        }

        $user = new User(
            $row->email,
            $row->password,
            $row->id,
            $row->nickname,
            $row->avatar_url
        );

        return $user;
    }

    public function addUser(User $user)
    {
        $row = new UserModel();
        $row->email = $user->getEmail();
        $row->password = $user->getpassword();
        $row->nickname = $user->getNickname();
        $row->avatar_url = $user->getAvatarUrl();
        $row->save();
    }

    public function updateUser(User $user)
    {
        $row = UserModel::where('id', $user->getId())->first();
        $row->email = $user->getEmail();
        $row->password = $user->getPassword();
        $row->nickname = $user->getNickname();
        $row->avatar_url = $user->getAvatarUrl();
        $row->save();
    }
}
