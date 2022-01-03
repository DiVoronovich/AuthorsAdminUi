<?php
declare(strict_types=1);

namespace ScienceSoft\AuthorsAdminUi\Controller\Adminhtml\Literature\Rus;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use ScienceSoft\AuthorsWebapi\Api\AuthorInterfaceFactory;
use ScienceSoft\AuthorsWebapi\Api\AuthorsRepositoryInterface;

class Save extends Action implements HttpPostActionInterface
{
    /**
     * @var AuthorInterfaceFactory
     */
    private AuthorInterfaceFactory $authorFactory;

    /**
     * @var AuthorsRepositoryInterface
     */
    private AuthorsRepositoryInterface $authorsRepository;

    /**
     * @param Context $context
     * @param AuthorInterfaceFactory $authorFactory
     */
    public function __construct(
        Context                    $context,
        AuthorInterfaceFactory     $authorFactory,
        AuthorsRepositoryInterface $authorsRepository
    ) {
        parent::__construct($context);
        $this->authorFactory = $authorFactory;
        $this->authorsRepository = $authorsRepository;
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $author = $this->authorFactory->create();
        $data = $this->getRequest()->getPostValue();
        $author->setName($data['name']);
        $author->setStatus((int)$data['status']);
        $author->setDate($data['date']);
        $author->setId((int)$data['author_id']);
        $this->authorsRepository->update($author);

        return $resultRedirect->setPath('*/*/listing');
    }
}
