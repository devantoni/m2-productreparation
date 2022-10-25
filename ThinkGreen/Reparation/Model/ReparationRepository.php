<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace ThinkGreen\Reparation\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use ThinkGreen\Reparation\Api\Data\ReparationInterface;
use ThinkGreen\Reparation\Api\Data\ReparationInterfaceFactory;
use ThinkGreen\Reparation\Api\Data\ReparationSearchResultsInterfaceFactory;
use ThinkGreen\Reparation\Api\ReparationRepositoryInterface;
use ThinkGreen\Reparation\Model\ResourceModel\Reparation as ResourceReparation;
use ThinkGreen\Reparation\Model\ResourceModel\Reparation\CollectionFactory as ReparationCollectionFactory;

class ReparationRepository implements ReparationRepositoryInterface
{

    /**
     * @var ReparationCollectionFactory
     */
    protected $reparationCollectionFactory;

    /**
     * @var ResourceReparation
     */
    protected $resource;

    /**
     * @var Reparation
     */
    protected $searchResultsFactory;

    /**
     * @var ReparationInterfaceFactory
     */
    protected $reparationFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;


    /**
     * @param ResourceReparation $resource
     * @param ReparationInterfaceFactory $reparationFactory
     * @param ReparationCollectionFactory $reparationCollectionFactory
     * @param ReparationSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceReparation $resource,
        ReparationInterfaceFactory $reparationFactory,
        ReparationCollectionFactory $reparationCollectionFactory,
        ReparationSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->reparationFactory = $reparationFactory;
        $this->reparationCollectionFactory = $reparationCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(ReparationInterface $reparation)
    {
        try {
            $this->resource->save($reparation);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the reparation: %1',
                $exception->getMessage()
            ));
        }
        return $reparation;
    }

    /**
     * @inheritDoc
     */
    public function get($reparationId)
    {
        $reparation = $this->reparationFactory->create();
        $this->resource->load($reparation, $reparationId);
        if (!$reparation->getId()) {
            throw new NoSuchEntityException(__('Reparation with id "%1" does not exist.', $reparationId));
        }
        return $reparation;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->reparationCollectionFactory->create();
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @inheritDoc
     */
    public function delete(ReparationInterface $reparation)
    {
        try {
            $reparationModel = $this->reparationFactory->create();
            $this->resource->load($reparationModel, $reparation->getReparationId());
            $this->resource->delete($reparationModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Reparation: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($reparationId)
    {
        return $this->delete($this->get($reparationId));
    }
}

