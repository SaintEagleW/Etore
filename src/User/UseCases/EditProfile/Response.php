<?php

namespace Etore\User\UseCases\EditProfile;

class Response
{
    public function format(): array
    {
        return [
            'message' => '資料修改成功'
        ];
    }
}
