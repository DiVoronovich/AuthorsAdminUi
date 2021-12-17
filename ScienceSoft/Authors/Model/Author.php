<?php

namespace ScienceSoft\Authors\Model;

use Magento\Framework\Model\AbstractModel;
use ScienceSoft\Authors\Model\ResourceModel\Author as ResourceModel;

class Author extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
}
