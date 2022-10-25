<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace ThinkGreen\Reparation\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Brands extends AbstractDb
{

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init('thinkgreen_reparation_brands', 'brands_id');
    }
}

