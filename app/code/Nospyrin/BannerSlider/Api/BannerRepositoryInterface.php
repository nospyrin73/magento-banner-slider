<?php declare(strict_types=1);

namespace Nospyrin\BannerSlider\Api;

use Nospyrin\BannerSlider\Api\Data\BannerInterface;

interface BannerRepositoryInterface
{
    /**
     * Banner save method
     *
     * @param BannerInterface $banner
     * @return void
     */
    public function save(BannerInterface $banner): void;

    /**
     * Get banner by ID
     *
     * @param int $bannerId
     * @return BannerInterface
     */
    public function getById(int $bannerId): BannerInterface;

    /**
     * Delete banner by ID
     *
     * @param BannerInterface $banner
     * @return void
     * @throws \Exception
     */
    public function delete(BannerInterface $banner): void;
}
