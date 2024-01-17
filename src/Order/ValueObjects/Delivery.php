<?php

namespace Etore\Order\ValueObjects;

class Delivery
{
    private string $method;
    private string $status;

    public function __construct(string $method, string $status)
    {
        $this->method = $method;
        $this->status = $status;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getMethod(): string
    {
        return $this->method;
    }
}
