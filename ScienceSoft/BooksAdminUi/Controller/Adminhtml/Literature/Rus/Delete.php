<?php
declare(strict_types=1);

namespace ScienceSoft\BooksAdminUi\Controller\Adminhtml\Literature\Rus;

use Exception;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\Redirect;
use ScienceSoft\BooksWebapi\Api\BooksRepositoryInterface;

class Delete extends \Magento\Backend\App\Action
{
    /**
     * @var BooksRepositoryInterface
     */
    private BooksRepositoryInterface $booksRepository;

    /**
     * @param Context $context
     * @param BooksRepositoryInterface $booksRepository
     */
    public function __construct(
        Context $context,
        BooksRepositoryInterface $booksRepository
    ) {
        parent::__construct($context);
        $this->booksRepository = $booksRepository;
    }

    /**
     * @return Redirect
     * @throws Exception
     */
    public function execute(): Redirect
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $bookId = $this->getRequest()->getParam('id');
        $this->booksRepository->deleteById((int) $bookId);

        return $resultRedirect->setPath('*/*/listing');
    }
}
