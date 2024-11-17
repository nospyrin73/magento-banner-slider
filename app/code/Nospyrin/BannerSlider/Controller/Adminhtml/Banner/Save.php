<?php declare(strict_types = 1);

namespace Nospyrin\BannerSlider\Controller\Adminhtml\Banner;

use Nospyrin\BannerSlider\Model\BannerFactory;
use Magento\Backend\App\Action\Context;
use Nospyrin\BannerSlider\Model\ImageUploader;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\App\Cache\Manager;

class Save extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;
    protected $bannerFactory;
    protected $messageManager;
    protected $cacheManager;
    protected $imageUploaderModel;

    public function __construct(
        Context $context,
        BannerFactory $bannerFactory,
        ImageUploader $imageUploaderModel,
        ManagerInterface $messageManager,
        Manager $cacheManager
    ) {
        parent::__construct($context);
        $this->bannerFactory = $bannerFactory;
        $this->imageUploaderModel = $imageUploaderModel;
        $this->messageManager = $messageManager;
        $this->cacheManager = $cacheManager;
    }

    public function execute()
    {
        try {
            $resultRedirect = $this->resultRedirectFactory->create();
            $data = $this->getRequest()->getPostValue();

            if (empty($data)) {
                $this->messageManager->addErrorMessage(__("No data provided."));
                return $resultRedirect->setPath('nospyrin_bannerslider/index/new');
            }

            $banner = $this->bannerFactory->create();


            if (empty($data['banner_id'])) {
                // Ensure new entity is created if banner_id is not set
                $data['banner_id'] = null;
            } else {
                $banner->load($data['banner_id']);

            }

            $banner->addData($data);
            $banner = $this->prepareImageData($banner, $data);

            $banner->save();

            $this->messageManager->addSuccessMessage(__("Data saved successfully."));
            $buttonData = $this->getRequest()->getParam('back');

            if ($buttonData == 'edit' && $banner->getId()) {
                return $resultRedirect->setPath('nospyrin_bannerslider/banner/edit', ['id' => $banner->getId()]);
            }

            if ($buttonData == 'new') {
                return $resultRedirect->setPath('nospyrin_bannerslider/banner/edit');
            }

            if ($buttonData == 'close') {
                return $resultRedirect->setPath('nospyrin_bannerslider/banner/index');
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__($e->getMessage()));
        }

        return $resultRedirect->setPath('nospyrin_bannerslider/banner/index');
    }

    public function prepareImageData($banner, $data)
    {
        if (!empty($data['image'][0])) {
            $imageField = $data['image'][0];
            $imageName = $imageField['name'] ?? null;
            $imageUrl = $imageField['url'] ?? null;

            $savedImage = $this->imageUploaderModel->saveMediaImage($imageName, $imageUrl);
            $banner->setData('image', $savedImage);
        } else {
            $banner->setData('image', '');
        }

        return $banner;
    }
}
