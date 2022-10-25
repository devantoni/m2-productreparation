<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace ThinkGreen\Reparation\ViewModel;


use ThinkGreen\Reparation\Model\ResourceModel\Reparation\CollectionFactory;
use \Magento\Store\Model\StoreManagerInterface;


class Data implements \Magento\Framework\View\Element\Block\ArgumentInterface
{

    protected $collectionFactory;
    
    protected $_brandsRepository;

    /**
     * Data constructor.
     *
     */
    public function __construct(
        CollectionFactory $collectionFactory,
        \ThinkGreen\Reparation\Model\BrandsRepository $brandsRepository,
        StoreManagerInterface $storeManager
    )
    {
        $this->collectionFactory = $collectionFactory;
        $this->_brandsRepository = $brandsRepository;
        $this->storeManager = $storeManager;    
    }

    public function getReparationCollections()
    {
        
        $collection = $this->collectionFactory->create();
        return $collection->getData();    
    }

    public function getReparationByBrandCollections($id)
    {
        
        $collection = $this->collectionFactory->create()
                        ->addFieldToFilter('brands_id',$id);
        return $collection->getData();    
    }

    /**
     * @return string
     */
    public function getReparationMediaUrl() {
        $mediaUrl = $this->storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA).'reparation/image/';
        return $mediaUrl;
    }

    /**
     * @return string
     */
    public function getBrandsMediaUrl() {
        $mediaUrl = $this->storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA).'brands/image/';
        return $mediaUrl;
    }

    public function getBrandsById($id){

        return $this->_brandsRepository->get($id);

    }
}

