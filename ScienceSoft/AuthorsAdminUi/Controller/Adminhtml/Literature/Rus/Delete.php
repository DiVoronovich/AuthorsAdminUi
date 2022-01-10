<?php
declare(strict_types=1);

namespace ScienceSoft\AuthorsAdminUi\Controller\Adminhtml\Literature\Rus;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\Redirect;
use ScienceSoft\AuthorsWebapi\Api\AuthorInterfaceFactory;
use ScienceSoft\AuthorsWebapi\Api\AuthorsRepositoryInterface;

class Delete extends \Magento\Backend\App\Action
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
     * @param AuthorsRepositoryInterface $authorsRepository
     */
    public function __construct(
        Context                    $context,
        AuthorInterfaceFactory     $authorFactory,
        AuthorsRepositoryInterface $authorsRepository
    )
    {
        parent::__construct($context);
        $this->authorFactory = $authorFactory;
        $this->authorsRepository = $authorsRepository;
    }

    /**
     * @return Redirect
     */
    public function execute(): Redirect
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('id');
        $this->authorsRepository->deleteById((int)$id);

        return $resultRedirect->setPath('*/*/listing');
    }
}
