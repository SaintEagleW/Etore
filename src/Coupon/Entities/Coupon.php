<?php

namespace Etore\Coupon\Entities;

class Coupon
{
    private int $id;
    private string $title;
    private string $desc;
    private string $code;
    private string $type;
    private int $discount;
    private string $status;
    private int $userId;
    private string $createdAt;
    private string $startedAt;
    private string $expiredAt;

    public function __construct(
        string $title,
        string $desc,
        string $code,
        string $type,
        int $discount,
        string $status,
        int $userId,
        string $startedAt,
        string $expiredAt,
        int $id = -1,
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->desc = $desc;
        $this->code = $code;
        $this->type = $type;
        $this->discount = $discount;
        $this->status = $status;
        $this->userId = $userId;
        $this->createdAt = now()->toDateTimeString();
        $this->startedAt = $startedAt;
        $this->expiredAt = $expiredAt;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDesc(): string
    {
        return $this->desc;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getDiscount(): int
    {
        return $this->discount;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function getStartedAt(): string
    {
        return $this->startedAt;
    }

    public function getExpiredAt(): string
    {
        return $this->expiredAt;
    }
}
