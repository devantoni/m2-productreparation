<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace ThinkGreen\Reparation\Model;

use Magento\Framework\Model\AbstractModel;
use ThinkGreen\Reparation\Api\Data\BrandsInterface;

class Brands extends AbstractModel implements BrandsInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\ThinkGreen\Reparation\Model\ResourceModel\Brands::class);
    }

    /**
     * @inheritDoc
     */
    public function getBrandsId()
    {
        return $this->getData(self::BRANDS_ID);
    }

    /**
     * @inheritDoc
     */
    public function setBrandsId($brandsId)
    {
        return $this->setData(self::BRANDS_ID, $brandsId);
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * @inheritDoc
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * @inheritDoc
     */
    public function getCategory()
    {
        return $this->getData(self::CATEGORY);
    }

    /**
     * @inheritDoc
     */
    public function setCategory($category)
    {
        return $this->setData(self::CATEGORY, $category);
    }

    /**
     * @inheritDoc
     */
    public function getIcon()
    {
        return $this->getData(self::ICON);
    }

    /**
     * @inheritDoc
     */
    public function setIcon($icon)
    {
        return $this->setData(self::ICON, $icon);
    }

    /**
     * @inheritDoc
     */
    public function getUrlKey()
    {
        return $this->getData(self::URL_KEY);
    }

    /**
     * @inheritDoc
     */
    public function setUrlKey($urlKey)
    {
        return $this->setData(self::URL_KEY, $urlKey);
    }
}

