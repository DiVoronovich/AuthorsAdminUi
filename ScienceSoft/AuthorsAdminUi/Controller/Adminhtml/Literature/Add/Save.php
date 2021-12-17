<?php
declare(strict_types=1);

namespace ScienceSoft\AuthorsAdminUi\Controller\Adminhtml\Literature\Add;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use ScienceSoft\Authors\Model\AuthorFactory;

class Save extends Action implements HttpPostActionInterface
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
        $author = $this->authorFactory->create();
        $data = $this->getRequest()->getPostValue();
        $postData = [
            'name' => $data['name'],
            'status' => $data['status'],
            'date' => $data['date'],
        ];
        $author->addData($postData);
        $author->save();
        return $resultRedirect->setPath('*/literature_rus/listing');
    }
}
