<?php
declare(strict_types=1);

namespace ScienceSoft\Authors\Plugin;

use Magento\Framework\Api\Search\SearchResult;
use ScienceSoft\AuthorsWebapi\Api\AuthorsRepositoryInterface;
use ScienceSoft\AuthorsWebapi\Api\Data\AuthorInterface;
use ScienceSoft\BooksWebapi\Api\BooksRepositoryInterface;

class AuthorsRepositoryPlugin
{
    /**
     * @var BooksRepositoryInterface
     */
    private BooksRepositoryInterface $booksRepository;

    /**
     * @param BooksRepositoryInterface $booksRepository
     */
    public function __construct(
        BooksRepositoryInterface $booksRepository
    ) {
        $this->booksRepository = $booksRepository;
    }

    /**
     * @param AuthorsRepositoryInterface $subject
     * @param AuthorInterface $author
     * @return AuthorInterface
     */
    public function afterGetByIdentity(
        AuthorsRepositoryInterface $subject,
        AuthorInterface $author
    ): ?AuthorInterface {
        $book = $this->booksRepository->getById(1);
        $extensionAttributes = $author->getExtensionAttributes();
        $extensionAttributes->setBook($book);
        $author->setExtensionAttributes($extensionAttributes);
        return $author;
    }

    /**
     * @param AuthorsRepositoryInterface $subject
     * @param SearchResult $searchResult
     * @return SearchResult
     */
    public function afterGetList(
        AuthorsRepositoryInterface $subject,
        SearchResult $searchResult
    ): SearchResult {
        $authors = [];
        foreach ($searchResult->getItems() as $entity) {
            $book = $this->booksRepository->getById(1);
            $extensionAttributes = $entity->getExtensionAttributes();
            $extensionAttributes->setBook($book);
            $entity->setExtensionAttributes($extensionAttributes);

            $authors[] = $entity;
        }
        $searchResult->setItems($authors);
        return $searchResult;
    }
}
