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
use ThinkGreen\Reparation\Api\BrandsRepositoryInterface;
use ThinkGreen\Reparation\Api\Data\BrandsInterface;
use ThinkGreen\Reparation\Api\Data\BrandsInterfaceFactory;
use ThinkGreen\Reparation\Api\Data\BrandsSearchResultsInterfaceFactory;
use ThinkGreen\Reparation\Model\ResourceModel\Brands as ResourceBrands;
use ThinkGreen\Reparation\Model\ResourceModel\Brands\CollectionFactory as BrandsCollectionFactory;

class BrandsRepository implements BrandsRepositoryInterface
{

    /**
     * @var ResourceBrands
     */
    protected $resource;

    /**
     * @var Brands
     */
    protected $searchResultsFactory;

    /**
     * @var BrandsInterfaceFactory
     */
    protected $brandsFactory;

    /**
     * @var BrandsCollectionFactory
     */
    protected $brandsCollectionFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;


    /**
     * @param ResourceBrands $resource
     * @param BrandsInterfaceFactory $brandsFactory
     * @param BrandsCollectionFactory $brandsCollectionFactory
     * @param BrandsSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceBrands $resource,
        BrandsInterfaceFactory $brandsFactory,
        BrandsCollectionFactory $brandsCollectionFactory,
        BrandsSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->brandsFactory = $brandsFactory;
        $this->brandsCollectionFactory = $brandsCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(BrandsInterface $brands)
    {
        try {
            $this->resource->save($brands);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the brands: %1',
                $exception->getMessage()
            ));
        }
        return $brands;
    }

    /**
     * @inheritDoc
     */
    public function get($brandsId)
    {
        $brands = $this->brandsFactory->create();
        $this->resource->load($brands, $brandsId);
        if (!$brands->getId()) {
            throw new NoSuchEntityException(__('Brands with id "%1" does not exist.', $brandsId));
        }
        return $brands;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->brandsCollectionFactory->create();
        
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
    public function delete(BrandsInterface $brands)
    {
        try {
            $brandsModel = $this->brandsFactory->create();
            $this->resource->load($brandsModel, $brands->getBrandsId());
            $this->resource->delete($brandsModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Brands: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($brandsId)
    {
        return $this->delete($this->get($brandsId));
    }
}

