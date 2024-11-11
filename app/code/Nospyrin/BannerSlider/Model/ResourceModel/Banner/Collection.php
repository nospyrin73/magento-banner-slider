<?php declare(strict_types = 1);

namespace Nospyrin\BannerSlider\Model\ResourceModel\Banner;

use Nospyrin\BannerSlider\Model\Banner;
use Nospyrin\BannerSlider\Model\ResourceModel\Banner as ResourceModelBanner;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'banner_id';

    /**
     * Define the resource model & the model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(Banner::class, ResourceModelBanner::class);
    }
}
