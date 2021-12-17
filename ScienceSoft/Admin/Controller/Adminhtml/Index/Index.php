<?php
declare(strict_types=1);

//namespace ScienceSoft\Authors\Controller\Adminhtml\Index;

namespace ScienceSoft\Admin\Controller\Adminhtml\Index;

use Magento\Framework\Controller\ResultFactory;

class Index extends \Magento\Backend\App\Action
{
    public function execute()
    {
        $result = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        return $result;
    }
}
