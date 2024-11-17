<?php

declare(strict_types=1);

namespace Nospyrin\BannerSlider\Controller\Adminhtml\Banner;

use Nospyrin\BannerSlider\Api\BannerRepositoryInterface;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;

class Delete extends Action
{
    /**
     * @param Context $context
     * @param BannerRepositoryInterface $bannerRepository
     */
    public function __construct(
        Context $context,
        private readonly BannerRepositoryInterface $bannerRepository,
    ) {
        parent::__construct($context);
    }

    /**
     * Execute delete route action
     *
     * @return ResultInterface
     */
    public function execute(): ResultInterface
    {
        $bannerId = (int) $this->getRequest()->getParam('banner_id');
        $banner = $this->bannerRepository->getById($bannerId);

        try {
            $this->bannerRepository->delete($banner);
            $this->messageManager->addSuccessMessage(
                __('The banner %1 has been deleted.', $banner->getName()),
            );
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }

        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('*/*/index');
    }
}
