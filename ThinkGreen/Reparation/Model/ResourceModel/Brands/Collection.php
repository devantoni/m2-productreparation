<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace ThinkGreen\Reparation\Model\ResourceModel\Brands;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'brands_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \ThinkGreen\Reparation\Model\Brands::class,
            \ThinkGreen\Reparation\Model\ResourceModel\Brands::class
        );
    }
}

