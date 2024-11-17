<?php declare(strict_types=1);

namespace Nospyrin\BannerSlider\Api\Data;

interface BannerInterface
{
    public function getBannerId(): int;
    public function setBannerId(int $bannerId);
    public function getName(): string;
    public function setName(string $name);
    public function getIdentifier(): string;
    public function setIdentifier(string $identifier);
    public function getCreatedAt(): string;
    public function setCreatedAt(string $createdAt);
    public function getUpdatedAt(): string;
    public function setUpdatedAt(string $updatedAt);
    public function getIsActive(): bool;
    public function setIsActive(bool $isActive);
}
