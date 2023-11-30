<?php

namespace Etore;

use Exception;

abstract class EtoreException extends Exception
{
    public function format(): array
    {
        return [
            'errors' => [
                'code' => $this->code,
                'msg' => $this->message
            ]
        ];
    }

    abstract public function getStatusCode(): int;
}
