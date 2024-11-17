<?php

declare(strict_types=1);

namespace Nospyrin\BannerSlider\Model\ResourceModel\Banner;

use Nospyrin\BannerSlider\Model\Banner;
use Nospyrin\BannerSlider\Model\ResourceModel\Banner as BannerResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            Banner::class,
            BannerResource::class
        );
    }
}
