<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace ThinkGreen\Reparation\Api\Data;

interface BrandsInterface
{
    const URL_KEY = 'url_key';
    const CATEGORY = 'category';
    const NAME = 'name';
    const BRANDS_ID = 'brands_id';
    const ICON = 'icon';

    /**
     * Get brands_id
     * @return string|null
     */
    public function getBrandsId();

    /**
     * Set brands_id
     * @param string $brandsId
     * @return \ThinkGreen\Reparation\Brands\Api\Data\BrandsInterface
     */
    public function setBrandsId($brandsId);

    /**
     * Get name
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     * @param string $name
     * @return \ThinkGreen\Reparation\Brands\Api\Data\BrandsInterface
     */
    public function setName($name);

    /**
     * Get category
     * @return string|null
     */
    public function getCategory();

    /**
     * Set category
     * @param string $category
     * @return \ThinkGreen\Reparation\Brands\Api\Data\BrandsInterface
     */
    public function setCategory($category);

    /**
     * Get icon
     * @return string|null
     */
    public function getIcon();

    /**
     * Set icon
     * @param string $icon
     * @return \ThinkGreen\Reparation\Brands\Api\Data\BrandsInterface
     */
    public function setIcon($icon);

    /**
     * Get url_key
     * @return string|null
     */
    public function getUrlKey();

    /**
     * Set url_key
     * @param string $url_key
     * @return \ThinkGreen\Reparation\Brands\Api\Data\BrandsInterface
     */
    public function setUrlKey($urlKey);
    
}

