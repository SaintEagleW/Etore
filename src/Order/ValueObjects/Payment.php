<?php

namespace Etore\Order\ValueObjects;

class Payment
{
    private string $method;
    private int $amount;

    public function __construct(string $method, int $amount)
    {
        $this->method = $method;
        $this->amount = $amount;
    }

    public function getMethod(): string
    {
        return $this->method;
    }
}
