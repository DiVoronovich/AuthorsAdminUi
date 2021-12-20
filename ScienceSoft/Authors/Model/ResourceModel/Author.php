<?php

namespace ScienceSoft\Authors\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Author extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('scnsoft_authors', 'author_id');
    }
}
