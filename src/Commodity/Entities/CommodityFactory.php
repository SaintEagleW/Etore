<?php

namespace Etore\Commodity\Entities;

use App\Models\Commodity as CommodityModel;

class CommodityFactory
{
    public function createCommodity(CommodityModel $model): Commodity
    {
        return new Commodity(
            $model->id,
            $model->price,
            $model->product_name . ' ' . $model->sku,
            $model->desc,
            $model->product_pic_url
        );
    }
}
