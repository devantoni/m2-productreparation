<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace ThinkGreen\Reparation\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface ReparationRepositoryInterface
{

    /**
     * Save Reparation
     * @param \ThinkGreen\Reparation\Api\Data\ReparationInterface $reparation
     * @return \ThinkGreen\Reparation\Api\Data\ReparationInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \ThinkGreen\Reparation\Api\Data\ReparationInterface $reparation
    );

    /**
     * Retrieve Reparation
     * @param string $reparationId
     * @return \ThinkGreen\Reparation\Api\Data\ReparationInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($reparationId);

    /**
     * Retrieve Reparation matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \ThinkGreen\Reparation\Api\Data\ReparationSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Reparation
     * @param \ThinkGreen\Reparation\Api\Data\ReparationInterface $reparation
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \ThinkGreen\Reparation\Api\Data\ReparationInterface $reparation
    );

    /**
     * Delete Reparation by ID
     * @param string $reparationId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($reparationId);
}

