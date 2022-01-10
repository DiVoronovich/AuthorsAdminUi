<?php
declare(strict_types=1);

namespace ScienceSoft\AuthorsAdminUi\Controller\Adminhtml\Literature\Rus;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;

class Listing extends Action implements HttpGetActionInterface
{
    /**
     * @var Context
     */
    private Context $context;

    /**
     * @param Context $context
     */
    public function __construct(
        Context $context
    )
    {
        parent::__construct($context);
        $this->context = $context;
    }

    /**
     * @return ResultInterface
     */
    public function execute(): ResultInterface
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
