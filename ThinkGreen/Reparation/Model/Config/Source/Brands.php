<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
namespace ThinkGreen\Reparation\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class Brands implements ArrayInterface
{
    /**
     * @var \ThinkGreen\Reparation\Model\ResourceModel\Brands\Collection
     */
    protected $brandsCollection;

    /**
     * [__construct description]
     * @param \ThinkGreen\Reparation\Model\ResourceModel\Brands\Collection $reparationCollection [description]
     */
    public function __construct(
        \ThinkGreen\Reparation\Model\ResourceModel\Brands\Collection $brandsCollection
    ) {
        $this->brandsCollection = $brandsCollection;
    }

    public function toOptionArray()
    {
        $collection = $this->brandsCollection->getData();
        $options = [];
        

        foreach ($collection as $key => $value) {
            $options[] = ['value' => $value['brands_id'], 'label' => $value['name']];
        }

        return $options;
    }
}
