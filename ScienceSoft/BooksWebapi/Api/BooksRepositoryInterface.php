<?php
declare(strict_types=1);

namespace ScienceSoft\BooksWebapi\Api;

use ScienceSoft\BooksWebapi\Api\Data\BookInterface;

interface BooksRepositoryInterface
{
    /**
     * @param int $bookId
     * @return \ScienceSoft\BooksWebapi\Api\Data\BookInterface
     */
    public function getById(int $bookId): BookInterface;
}
