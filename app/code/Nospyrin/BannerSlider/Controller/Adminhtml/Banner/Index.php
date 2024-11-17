<?php

declare(strict_types=1);

namespace Nospyrin\BannerSlider\Controller\Adminhtml\Banner;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;

class Index extends Action
{
    /**
     * Execute index route action
     *
     * @return ResultInterface
     */
    public function execute(): ResultInterface
    {
        $page = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $page->setActiveMenu('Nospyrin_BannerSlider::banner');
        $page->getConfig()->getTitle()->prepend(__('Banners'));

        return $page;
    }
}
