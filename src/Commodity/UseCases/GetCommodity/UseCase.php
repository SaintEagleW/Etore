<?php

namespace Etore\Commodity\UseCases\GetCommodity;

use Etore\Commodity\Exception\ErrorCode;
use Etore\Commodity\Exception\CommodityException;
use Etore\Commodity\Repositories\CommodityRepository;

class UseCase
{
    private CommodityRepository $commodityRepository;

    public function __construct()
    {
        $this->commodityRepository = new CommodityRepository();
    }

    public function execute(Request $request): Response
    {
        $commodityId = $request->getCommodityId();
        $commodity = $this->commodityRepository->get($commodityId);

        if (is_null($commodity)) {
            throw new CommodityException(ErrorCode::CommodityNotFound);
        }

        return new Response($commodity);
    }
}
