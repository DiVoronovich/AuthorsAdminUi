<?php
declare(strict_types=1);

namespace ScienceSoft\Books\Model\ResourceModel\Book;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use ScienceSoft\Books\Model\Book as Model;
use ScienceSoft\Books\Model\ResourceModel\Book as ResourceModel;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
