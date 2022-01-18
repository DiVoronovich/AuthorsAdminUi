<?php
declare(strict_types=1);

namespace ScienceSoft\Authors\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Author extends AbstractDb
{
    /**
     * @return void
     * @SuppressWarnings(PHPMD.CamelCaseMethodName)
     */
    protected function _construct()
    {
        $this->_init('scnsoft_authors', 'author_id');
    }
}
