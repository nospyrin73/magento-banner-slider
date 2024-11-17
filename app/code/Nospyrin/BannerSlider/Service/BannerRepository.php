<?php

declare(strict_types=1);

namespace Nospyrin\BannerSlider\Service;

use Nospyrin\BannerSlider\Api\Data\BannerInterface;
use Nospyrin\BannerSlider\Api\BannerRepositoryInterface;
use Nospyrin\BannerSlider\Model\ResourceModel\Banner as BannerResource;
use Nospyrin\BannerSlider\Model\BannerFactory;
use Magento\Framework\Exception\AlreadyExistsException;
use Magento\Framework\Exception\NoSuchEntityException;

class BannerRepository implements BannerRepositoryInterface
{
    /**
     * @param BannerResource $resource
     * @param BannerFactory $factory
     */
    public function __construct(
        private readonly BannerResource $resource,
        private readonly BannerFactory $factory,
    ) {
    }

    /**
     * Banner save method
     *
     * @param BannerInterface $banner
     * @return void
     * @throws AlreadyExistsException
     */
    public function save(BannerInterface $banner): void
    {
        $this->resource->save($banner);
    }

    /**
     * Get banner by ID
     *
     * @param int $bannerId
     * @return BannerInterface
     * @throws NoSuchEntityException
     */
    public function getById(int $bannerId): BannerInterface
    {
        $banner = $this->factory->create();
        $this->resource->load($banner, $bannerId);
        if (!$banner->getId()) {
            throw new NoSuchEntityException(
                __('The banner with id "%d" does not exist.', $bannerId)
            );
        }

        return $banner;
    }

    /**
     * Delete banner
     *
     * @param BannerInterface $banner
     * @return void
     * @throws \Exception
     */
    public function delete(BannerInterface $banner): void
    {
        $this->resource->delete($banner);
    }
}
