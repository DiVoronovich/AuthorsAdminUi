<?php
declare(strict_types=1);

namespace ScienceSoft\AuthorsAdminUi\Controller\Adminhtml\Literature\Add;

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
    private AuthorsRepositoryInterface $authorsRepository;

    /**
     * @param Context $context
     * @param AuthorInterfaceFactory $authorFactory
     */
    public function __construct(
        Context $context,
        AuthorInterfaceFactory $authorFactory,
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
        $this->authorsRepository->save($author);
        return $resultRedirect->setPath('*/literature_rus/listing');
    }
}