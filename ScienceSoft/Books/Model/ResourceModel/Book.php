<?php
declare(strict_types=1);

namespace ScienceSoft\Books\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Book extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('scnsoft_authors_books', 'book_id');
    }
}
