<?php
declare(strict_types=1);

namespace ScienceSoft\BooksWebapi\Model;

use ScienceSoft\Books\Model\ResourceModel\Book as BookResource;
use ScienceSoft\BooksWebapi\Api\BooksRepositoryInterface;
use ScienceSoft\BooksWebapi\Api\Data\BookInterface;
use ScienceSoft\BooksWebapi\Api\Data\BookInterfaceFactory;

class BookRepository implements BooksRepositoryInterface
{
    /**
     * @var BookInterfaceFactory
     */
    private BookInterfaceFactory $bookFactory;

    /**
     * @var BookResource
     */
    private BookResource $bookResource;

    /**
     * @param BookInterfaceFactory $bookFactory
     * @param BookResource $bookResource
     */
    public function __construct(
        BookInterfaceFactory $bookFactory,
        BookResource $bookResource
    ) {
        $this->bookFactory = $bookFactory;
        $this->bookResource = $bookResource;
    }

    /**
     * Get book by id
     *
     * @param int $bookId
     * @return BookInterface
     */
    public function getById(int $bookId): BookInterface
    {
        $book = $this->bookFactory->create();
        $this->bookResource->load($book, $bookId);
        return $book;
    }
}
