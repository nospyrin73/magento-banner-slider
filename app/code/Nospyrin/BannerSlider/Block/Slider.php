<?php declare(strict_types = 1);

namespace Nospyrin\BannerSlider\Block;

use Magento\Framework\UrlInterface;
use \Nospyrin\BannerSlider\Model\ResourceModel\Banner\CollectionFactory as BannerCollectionFactory;

class Slider extends \Magento\Framework\View\Element\Template
{
    protected $collection;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param BannerCollectionFactory $collection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        BannerCollectionFactory $collectionFactory,
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        parent::__construct($context, $data);
    }

    public function getBanners() {
        $this->collection->addFieldToFilter('is_active', 1);

        foreach ($this->collection as $banner) {
            $banner->setImageUrl($this->_getFullImageUrl($banner->getImage()));
        }


        return $this->collection;
    }

    private function _getFullImageUrl($imageName) {
        return $this->_storeManager->getStore()->getBaseUrl(UrlInterface::URL_TYPE_MEDIA) . 'wysiwyg/banner_slider/' . $imageName;
    }
}
