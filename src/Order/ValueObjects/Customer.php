<?php

namespace Etore\Order\ValueObjects;

class Customer
{
    private string $name;
    private string $phoneNumber;
    private string $address;

    public function __construct(string $name, string $phoneNumber, string $address)
    {
        $this->name = $name;
        $this->phoneNumber = $phoneNumber;
        $this->address = $address;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function getAddress(): string
    {
        return $this->address;
    }
}
