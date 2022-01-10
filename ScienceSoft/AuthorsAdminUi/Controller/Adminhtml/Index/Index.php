<?php
declare(strict_types=1);

namespace ScienceSoft\AuthorsAdminUi\Controller\Adminhtml\Index;

use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;

class Index extends \Magento\Backend\App\Action
{
    /**
     * @return ResultInterface
     */
    public function execute(): ResultInterface
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
