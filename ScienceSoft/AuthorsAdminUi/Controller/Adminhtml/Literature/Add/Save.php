<?php
declare(strict_types=1);

namespace ScienceSoft\AuthorsAdminUi\Controller\Adminhtml\Literature\Add;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\Result\Redirect;
use ScienceSoft\AuthorsWebapi\Api\Data\AuthorInterfaceFactory;
use ScienceSoft\AuthorsWebapi\Api\AuthorsRepositoryInterface;
use ScienceSoft\AuthorsWebapi\Api\Data\AuthorInterface;

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
        $data['image'] = $data['image'][0]['file'];
        $this->dataObjectHelper->populateWithArray($author, $data, AuthorInterface::class);
        $author->addData($data);
        $this->authorsRepository->save($author);
        return $resultRedirect->setPath('*/literature_rus/listing');
    }
}
