<?php
declare(strict_types=1);

namespace ScienceSoft\BooksAdminUi\Controller\Adminhtml\Literature\Add;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Exception\AlreadyExistsException;
use ScienceSoft\BooksWebapi\Api\BooksRepositoryInterface;
use ScienceSoft\BooksWebapi\Api\Data\BookInterface;
use ScienceSoft\BooksWebapi\Api\Data\BookInterfaceFactory;

class Save extends Action implements HttpPostActionInterface
{
    /**
     * @var BookInterfaceFactory
     */
    private BookInterfaceFactory $bookFactory;

    /**
     * @var BooksRepositoryInterface
     */
    private BooksRepositoryInterface $booksRepository;

    /**
     * @var DataObjectHelper
     */
    private DataObjectHelper $dataObjectHelper;

    /**
     * @param Context $context
     * @param BookInterfaceFactory $bookFactory
     * @param BooksRepositoryInterface $booksRepository
     * @param DataObjectHelper $dataObjectHelper
     */
    public function __construct(
        Context $context,
        BookInterfaceFactory $bookFactory,
        BooksRepositoryInterface $booksRepository,
        DataObjectHelper $dataObjectHelper
    ) {
        parent::__construct($context);
        $this->bookFactory = $bookFactory;
        $this->booksRepository = $booksRepository;
        $this->dataObjectHelper = $dataObjectHelper;
    }

    /**
     * @return Redirect
     * @throws AlreadyExistsException
     */
    public function execute(): Redirect
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $book = $this->bookFactory->create();
        $data = $this->getRequest()->getPostValue();
        $this->dataObjectHelper->populateWithArray($book, $data, BookInterface::class);
        $book->addData($data);
        $this->booksRepository->save($book);
        return $resultRedirect->setPath('*/literature_rus/listing');
    }
}
