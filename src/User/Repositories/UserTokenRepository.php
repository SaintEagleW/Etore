<?php

namespace Etore\User\Repositories;

use App\Models\UserToken;

class UserTokenRepository
{
    public function insert(string $token, int $userId)
    {
        $row = new UserToken();
        $row->user_id = $userId;
        $row->token = $token;
        $row->save();
    }

    public function getUserId(?string $token): ?int
    {
        $row = UserToken::where('token', $token)->first();

        return $row->user_id ? $row->user_id : null;
    }

    public function delete(string $token)
    {
        $row = UserToken::where('token', $token)->first();
        $row->delete();
    }
}
