<?php declare(strict_types = 1);

namespace Nospyrin\BannerSlider\Model\ResourceModel;

class Banner extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    private const TABLE_NAME = 'nospyrin_bannerslider';

    private const PRIMARY_KEY = 'banner_id';

    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    )
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init(self::TABLE_NAME, self::PRIMARY_KEY);
    }
}
