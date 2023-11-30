<?php

namespace Etore\Commodity\Repositories;

use App\Models\Commodity as CommodityModel;
use Etore\Commodity\Entities\Commodity;
use Etore\Commodity\Entities\CommodityFactory;

class CommodityRepository
{
    private CommodityFactory $factory;

    public function __construct()
    {
        $this->factory = new CommodityFactory();
    }

    public function get(int $commodityId): ?Commodity
    {
        $row = CommodityModel::find($commodityId);

        if (is_null($row)) {
            return null;
        }

        return $this->factory->createCommodity($row);
    }

    public function getCommodities(): array
    {
        $rows = CommodityModel::All();

        return $rows->map(function ($row) {
            return $this->factory->createCommodity($row);
        })->toArray();
    }
}
