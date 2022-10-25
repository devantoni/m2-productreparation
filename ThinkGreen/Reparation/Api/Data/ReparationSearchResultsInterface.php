<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace ThinkGreen\Reparation\Api\Data;

interface ReparationSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Reparation list.
     * @return \ThinkGreen\Reparation\Api\Data\ReparationInterface[]
     */
    public function getItems();

    /**
     * Set name list.
     * @param \ThinkGreen\Reparation\Api\Data\ReparationInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

