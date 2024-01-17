<?php

namespace Etore\Order\UseCases\CreateOrder;

use Etore\Order\Exception\OrderException;
use Etore\Order\Exception\ErrorCode;
use Etore\Utils\DataValidator;

class Request
{
    private const SCHEMA = [
        'token' => 'bail|required|string',
        'customerName' => 'bail|required|string',
        'customerPhoneNumber' => 'bail|required|string',
        'customerAddress' => 'bail|required|string',
        'deliveryMethod' => 'bail|required|string',
        'paymentMethod' => 'bail|required|string'
    ];

    private string $token;
    private string $customerName;
    private string $customerPhoneNumber;
    private string $customerAddress;
    private string $deliveryMethod;
    private string $paymentMethod;

    public function __construct(array $data)
    {
        $this->validate($data);
        $this->format($data);
    }

    private function validate(array $data): void
    {
        $validator = new DataValidator();
        if (!$validator->isPass($data, self::SCHEMA)) {
            throw new OrderException(ErrorCode::MissingRequiredData);
        }
    }

    private function format(array $data): void
    {
        $this->token = $data['token'];
        $this->customerName = $data['customerName'];
        $this->customerPhoneNumber = $data['customerPhoneNumber'];
        $this->customerAddress = $data['customerAddress'];
        $this->deliveryMethod = $data['deliveryMethod'];
        $this->paymentMethod = $data['paymentMethod'];
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function getCustomerName(): string
    {
        return $this->customerName;
    }

    public function getCustomerPhoneNumber(): string
    {
        return $this->customerPhoneNumber;
    }

    public function getCustomerAddress(): string
    {
        return $this->customerAddress;
    }

    public function getDeliveryMethod(): string
    {
        return $this->deliveryMethod;
    }

    public function getPaymentMethod(): string
    {
        return $this->paymentMethod;
    }
}
