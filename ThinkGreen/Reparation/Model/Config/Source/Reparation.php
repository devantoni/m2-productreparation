<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
namespace ThinkGreen\Reparation\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class Reparation implements ArrayInterface
{
    /**
     * @var \ThinkGreen\Reparation\Model\ResourceModel\Reparation\Collection
     */
    protected $reparationCollection;

    /**
     * [__construct description]
     * @param \ThinkGreen\Reparation\Model\ResourceModel\Reparation\Collection $reparationCollection [description]
     */
    public function __construct(
        \ThinkGreen\Reparation\Model\ResourceModel\Reparation\Collection $reparationCollection
    ) {
        $this->reparationCollection = $reparationCollection;
    }

    public function toOptionArray()
    {
        $collection = $this->reparationCollection->getData();
        $options = [];
        
        $options[] = ['value' => 0, 'label' => 'Select Model'];

        foreach ($collection as $key => $value) {
            $options[] = ['value' => $value['reparation_id'], 'label' => $value['name']];
        }

        return $options;
    }
}
