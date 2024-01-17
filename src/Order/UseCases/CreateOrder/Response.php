<?php

namespace Etore\Order\UseCases\CreateOrder;

class Response
{
    public function format(): array
    {
        return [
            'message' => '訂單建立成功'
        ];
    }
}
