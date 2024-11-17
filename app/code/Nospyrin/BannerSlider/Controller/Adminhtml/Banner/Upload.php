<?php declare(strict_types = 1);

namespace Nospyrin\BannerSlider\Controller\Adminhtml\Banner;

use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\Result\Json;
use Nospyrin\BannerSlider\Model\ImageUploader;

class Upload extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Nospyrin_BannerSlider::upload'; // TODO

    /**
     * @var Json
     */
    protected $json;

    /**
     * @var ImageUploader
     */
    protected $imageUploader;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     */
    public function __construct(
       \Magento\Backend\App\Action\Context $context,
       ResultFactory $resultFactory,
       ImageUploader $imageUploader
    )
    {
        $this->json = $resultFactory->create(ResultFactory::TYPE_JSON);
        $this->imageUploader = $imageUploader;
        return parent::__construct($context);
    }

    public function execute() {
		try {
			$result = $this->imageUploader->saveFileToTmpDir('image');
			$result['cookie'] = [
				'name' => $this->_getSession()->getName(),
				'value' => $this->_getSession()->getSessionId(),
				'lifetime' => $this->_getSession()->getCookieLifetime(),
				'path' => $this->_getSession()->getCookiePath(),
				'domain' => $this->_getSession()->getCookieDomain(),
			];
		} catch (\Exception $e) {
			$result = ['error' => $e->getMessage(), 'errorcode' => $e->getCode()];
		}

		return $this->json->setData($result);
	}

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed(static::ADMIN_RESOURCE);
    }
}
