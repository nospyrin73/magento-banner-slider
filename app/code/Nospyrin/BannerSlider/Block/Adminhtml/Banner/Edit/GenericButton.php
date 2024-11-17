<?php

declare(strict_types=1);

namespace Nospyrin\BannerSlider\Block\Adminhtml\Banner\Edit;

use Magento\Backend\Block\Widget\Context;
use Magento\Cms\Api\BlockRepositoryInterface;

class GenericButton
{
    /**
     * @var Context
     */
    protected Context $context;

    /**
     * @param Context $context
     * @param BlockRepositoryInterface $blockRepository
     */
    public function __construct(
        Context $context,
        BlockRepositoryInterface $blockRepository
    ) {
        $this->context = $context;
    }

    public function getBannerId(): int
    {
        return (int) $this->context->getRequest()->getParam('banner_id', 0);
    }

    public function getUrl(string $route = '', array $params = []): string
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
