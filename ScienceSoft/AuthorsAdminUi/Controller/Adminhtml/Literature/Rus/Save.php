<?php
declare(strict_types=1);

namespace ScienceSoft\AuthorsAdminUi\Controller\Adminhtml\Literature\Rus;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\Result\Redirect;
use ScienceSoft\AuthorsWebapi\Api\Data\AuthorInterface;
use ScienceSoft\AuthorsWebapi\Api\Data\AuthorInterfaceFactory;
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
     * @var DataObjectHelper
     */
    private DataObjectHelper $dataObjectHelper;

    /**
     * @param Context $context
     * @param AuthorInterfaceFactory $authorFactory
     * @param AuthorsRepositoryInterface $authorsRepository
     * @param DataObjectHelper $dataObjectHelper
     */
    public function __construct(
        Context $context,
        AuthorInterfaceFactory $authorFactory,
        AuthorsRepositoryInterface $authorsRepository,
        DataObjectHelper $dataObjectHelper
    ) {
        parent::__construct($context);
        $this->authorFactory = $authorFactory;
        $this->authorsRepository = $authorsRepository;
        $this->dataObjectHelper = $dataObjectHelper;
    }

    /**
     * @return Redirect
     */
    public function execute(): Redirect
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $author = $this->authorFactory->create();
        $data = $this->getRequest()->getPostValue();
        $data['author_id'] = (int) $data['author_id'];
        $this->dataObjectHelper->populateWithArray($author, $data, AuthorInterface::class);
        $author->addData($data);
        $this->authorsRepository->update($author);

        return $resultRedirect->setPath('*/*/listing');
    }
}
