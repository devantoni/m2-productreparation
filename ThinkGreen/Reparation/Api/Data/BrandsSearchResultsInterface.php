<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace ThinkGreen\Reparation\Api\Data;

interface BrandsSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Brands list.
     * @return \ThinkGreen\Reparation\Api\Data\BrandsInterface[]
     */
    public function getItems();

    /**
     * Set name list.
     * @param \ThinkGreen\Reparation\Api\Data\BrandsInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

