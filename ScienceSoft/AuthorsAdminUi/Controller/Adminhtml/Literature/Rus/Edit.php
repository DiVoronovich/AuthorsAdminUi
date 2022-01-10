<?php
declare(strict_types=1);

namespace ScienceSoft\AuthorsAdminUi\Controller\Adminhtml\Literature\Rus;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
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
    public function __construct(
        Context                $context,
        AuthorInterfaceFactory $authorFactory
    )
    {
        parent::__construct($context);
        $this->authorFactory = $authorFactory;
    }

    /**
     * @return ResultInterface
     */
    public function execute(): ResultInterface
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
