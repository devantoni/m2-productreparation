<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace ThinkGreen\Reparation\Model\ResourceModel\Reparation;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'reparation_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \ThinkGreen\Reparation\Model\Reparation::class,
            \ThinkGreen\Reparation\Model\ResourceModel\Reparation::class
        );
    }
}

