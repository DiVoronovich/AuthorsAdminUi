<?php
declare(strict_types=1);

namespace ScienceSoft\AuthorsAdminUi\Controller\Adminhtml\Literature\Rus;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use ScienceSoft\AuthorsWebapi\Api\AuthorInterfaceFactory;

class Edit extends Action
{
    /**
     * @var AuthorInterfaceFactory
     */
    private AuthorInterfaceFactory $authorFactory;

    /**
     * @param Context $context
     * @param AuthorInterfaceFactory $authorFactory
     */
    public function __construct(Context $context, AuthorInterfaceFactory $authorFactory)
    {
        parent::__construct($context);
        $this->authorFactory = $authorFactory;
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $result = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        return $result;
    }
}
