<?php
declare(strict_types=1);

namespace ScienceSoft\Authors\Model\ResourceModel\Author;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use ScienceSoft\Authors\Model\Author as Model;
use ScienceSoft\Authors\Model\ResourceModel\Author as ResourceModel;

class Collection extends AbstractCollection
{
    /**
     * @return void
     * @SuppressWarnings(PHPMD.CamelCaseMethodName)
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
