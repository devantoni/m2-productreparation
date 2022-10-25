<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace ThinkGreen\Reparation\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface BrandsRepositoryInterface
{

    /**
     * Save Brands
     * @param \ThinkGreen\Reparation\Api\Data\BrandsInterface $brands
     * @return \ThinkGreen\Reparation\Api\Data\BrandsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \ThinkGreen\Reparation\Api\Data\BrandsInterface $brands
    );

    /**
     * Retrieve Brands
     * @param string $brandsId
     * @return \ThinkGreen\Reparation\Api\Data\BrandsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($brandsId);

    /**
     * Retrieve Brands matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \ThinkGreen\Reparation\Api\Data\BrandsSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Brands
     * @param \ThinkGreen\Reparation\Api\Data\BrandsInterface $brands
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \ThinkGreen\Reparation\Api\Data\BrandsInterface $brands
    );

    /**
     * Delete Brands by ID
     * @param string $brandsId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($brandsId);
}

