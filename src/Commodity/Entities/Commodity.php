<?php

namespace Etore\Commodity\Entities;

class Commodity
{
    private int $id;
    private int $price;
    private string $title;
    private string $description;
    private string $imageUrl;

    public function __construct(
        int $id,
        int $price,
        string $title,
        string $description,
        string $imageUrl
    ) {
        $this->id = $id;
        $this->price = $price;
        $this->title = $title;
        $this->description = $description;
        $this->imageUrl = $imageUrl;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }
}
