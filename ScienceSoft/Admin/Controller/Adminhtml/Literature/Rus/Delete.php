<?php
declare(strict_types=1);

namespace ScienceSoft\Admin\Controller\Adminhtml\Literature\Rus;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use ScienceSoft\Authors\Model\AuthorFactory;

class Delete extends \Magento\Backend\App\Action
{
    /**
     * @var AuthorFactory
     */
    private AuthorFactory $authorFactory;

    /**
     * @param Context $context
     * @param AuthorFactory $authorFactory
     */
    public function __construct(Context $context, AuthorFactory $authorFactory)
    {
        parent::__construct($context);
        $this->authorFactory = $authorFactory;
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('id');
        $author = $this->authorFactory->create();
        $author->load($id);
        $author->delete();

        return $resultRedirect->setPath('*/*/listing');
    }
}
