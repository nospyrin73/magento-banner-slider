<?php

declare(strict_types=1);

namespace Nospyrin\BannerSlider\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Banner extends AbstractDb
{
    private const TABLE_NAME = 'banner_slider';
    private const FIELD_NAME = 'banner_id';

    protected function _construct()
    {
        $this->_init(self::TABLE_NAME, self::FIELD_NAME);
    }
}
