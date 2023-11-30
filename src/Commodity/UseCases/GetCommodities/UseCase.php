<?php

namespace Etore\Commodity\UseCases\GetCommodities;

use Etore\Commodity\Repositories\CommodityRepository;

class UseCase
{
    private CommodityRepository $commodityRepository;

    public function __construct()
    {
        $this->commodityRepository = new CommodityRepository();
    }

    public function execute(): Response
    {
        $commodities = $this->commodityRepository->getCommodities();
        return new Response($commodities);
    }
}
