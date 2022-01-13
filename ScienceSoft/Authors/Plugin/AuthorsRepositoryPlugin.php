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
     * @var AuthorsRepositoryInterface
     */
    private AuthorsRepositoryInterface $authorsRepository;

    private BooksRepositoryInterface $booksRepository;

    /**
     * @param AuthorsRepositoryInterface $authorsRepository
     * @param BooksRepositoryInterface $booksRepository
     */
    public function __construct(
        AuthorsRepositoryInterface $authorsRepository,
        BooksRepositoryInterface $booksRepository
    ) {
        $this->authorsRepository = $authorsRepository;
        $this->booksRepository = $booksRepository;
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
            $bookName = $book->getBook();

            $extensionAttributes = $entity->getExtensionAttributes();
            $extensionAttributes->setBook($bookName);
            $entity->setExtensionAttributes($extensionAttributes);

            $authors[] = $entity;
        }
        $searchResult->setItems($authors);
        return $searchResult;
    }

    //    /**
    //     * @param AuthorsRepositoryInterface $subject
    //     * @param AuthorInterface $result
    //     * @param AuthorInterface $entity
    //     * @return AuthorInterface
    //     */
    //    public function afterSave(
    //        AuthorsRepositoryInterface $subject,
    //        AuthorInterface $result,
    //        AuthorInterface $entity
    //    ): AuthorInterface {
    //        $extensionAttributes = $entity->getExtensionAttributes();
    //        $ourCustomData = $extensionAttributes->getBook();
    //        $this->authorsRepository->save($ourCustomData);
    //
    //        $resultAttributes = $result->getExtensionAttributes();
    //        $resultAttributes->setBook($ourCustomData);
    //        $result->setExtensionAttributes($resultAttributes);
    //
    //        return $result;
    //    }
}
