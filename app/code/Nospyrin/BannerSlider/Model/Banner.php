<?php

declare(strict_types=1);

namespace Nospyrin\BannerSlider\Model;

use Nospyrin\BannerSlider\Api\Data\BannerInterface;
use Magento\Framework\Model\AbstractModel;
use Nospyrin\BannerSlider\Model\ResourceModel\Banner as BannerResource;

class Banner extends AbstractModel implements BannerInterface
{
    private const BANNER_ID = 'banner_id';
    private const NAME = 'name';
    private const IDENTIFIER = 'identifier';
    private const CREATED_AT = 'created_at';
    private const UPDATED_AT = 'updated_at';
    private const IS_ACTIVE = 'is_active';

    protected function _construct()
    {
        $this->_idFieldName = self::BANNER_ID;
        $this->_init(BannerResource::class);
    }

    public function getBannerId(): int
    {
        return (int) $this->getData(self::BANNER_ID);
    }

    public function setBannerId(int | null $bannerId): Banner
    {
        $this->setData(self::BANNER_ID, $bannerId);
        return $this;
    }

    public function getName(): string
    {
        return $this->getData(self::NAME);
    }

    public function setName(string $name): Banner
    {
        $this->setData(self::NAME, $name);
        return $this;
    }

    public function getIdentifier(): string
    {
        return $this->getData(self::IDENTIFIER);
    }

    public function setIdentifier(string $identifier): Banner
    {
        $this->setData(self::IDENTIFIER, $identifier);
        return $this;
    }

    public function getCreatedAt(): string
    {
        return $this->getData(self::CREATED_AT);
    }

    public function setCreatedAt(string $createdAt): Banner
    {
        $this->setData(self::CREATED_AT, $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getData(self::UPDATED_AT);
    }

    public function setUpdatedAt(string $updatedAt): Banner
    {
        $this->setData(self::UPDATED_AT, $updatedAt);
        return $this;
    }

    public function getIsActive(): bool
    {
        return (bool) $this->getData(self::IS_ACTIVE);
    }

    public function setIsActive(bool $isActive): Banner
    {
        $this->setData(self::IS_ACTIVE, $isActive);
        return $this;
    }
}
