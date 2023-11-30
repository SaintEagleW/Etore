<?php

namespace Etore\Commodity\UseCases\GetCommodity;

use Etore\Commodity\Entities\Commodity;

class Response
{
    private Commodity $commodity;

    public function __construct(Commodity $commodity)
    {
        $this->commodity = $commodity;
    }

    public function format(): array
    {
        return [
            'data' => [
                'id' => $this->commodity->getId(),
                'price' => $this->commodity->getPrice(),
                'title' => $this->commodity->getTitle(),
                'description' => $this->commodity->getDescription(),
                'imageUrl' => $this->commodity->getImageUrl()
            ]
        ];
    }
}
