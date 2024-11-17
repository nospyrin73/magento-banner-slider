<?php

declare(strict_types=1);

namespace Nospyrin\BannerSlider\Controller\Adminhtml\Banner;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Backend\Model\Session;
use Nospyrin\BannerSlider\Model\BannerFactory;

class Edit extends Action
{
    protected $pageFactory;

    protected $session;

    protected $bannerFactory;

    public function __construct(
        Action\Context $context,
        PageFactory $pageFactory,
        BannerFactory $bannerFactory,
        Session $session
    ) {
        $this->pageFactory = $pageFactory;
        $this->session = $session;
        $this->bannerFactory = $bannerFactory;
        parent::__construct($context);
    }


    public function execute(): ResultInterface
    {
        $id = $this->getRequest()->getParam('id');
        $model = $this->bannerFactory->create();

        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This banner no longer exists.'));
                return $this->resultRedirectFactory->create()->setPath('*/*/');
            }
        }

        $this->session->setEntityData($model->getData());

        $resultPage = $this->pageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(
            $id ? __('Edit Banner #%1', $id) : __('New Banner')
        );

        return $resultPage;
    }
}

        // $page = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        // $page->setActiveMenu('Nospyrin_BannerSlider::banner');
        // $page->getConfig()->getTitle()->prepend(__('New Banner'));