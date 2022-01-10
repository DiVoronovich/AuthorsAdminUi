<?php
declare(strict_types=1);

namespace ScienceSoft\AuthorsWebapi\Model;

use Exception;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\Search\SearchResultInterface;
use Magento\Framework\Exception\AlreadyExistsException;
use ScienceSoft\Authors\Model\ResourceModel\Author;
use \ScienceSoft\AuthorsWebapi\Api\AuthorInterfaceFactory;
use ScienceSoft\Authors\Model\ResourceModel\Author as AuthorResource;
use ScienceSoft\Authors\Model\ResourceModel\Author\CollectionFactory as AuthorCollectionFactory;
use ScienceSoft\AuthorsWebapi\Api\AuthorInterface;
use Magento\Framework\Api\Search\SearchResultFactory;
use ScienceSoft\AuthorsWebapi\Api\AuthorsRepositoryInterface;

class AuthorRepository implements AuthorsRepositoryInterface
{
    /**
     * @var AuthorInterfaceFactory
     */
    private AuthorInterfaceFactory $authorFactory;

    /**
     * @var AuthorResource
     */
    private AuthorResource $authorResource;

    /**
     * @var AuthorCollectionFactory
     */
    private AuthorCollectionFactory $authorCollectionFactory;

    /**
     * @var SearchResultFactory
     */
    private SearchResultFactory $searchResultFactory;

    /**
     * @var CollectionProcessorInterface
     */
    private CollectionProcessorInterface $collectionProcessor;

    /**
     * @param AuthorInterfaceFactory $authorFactory
     * @param AuthorResource $authorResource
     * @param AuthorCollectionFactory $authorCollectionFactory
     * @param SearchResultFactory $searchResultFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        AuthorInterfaceFactory       $authorFactory,
        AuthorResource               $authorResource,
        AuthorCollectionFactory      $authorCollectionFactory,
        SearchResultFactory          $searchResultFactory,
        CollectionProcessorInterface $collectionProcessor
    )
    {
        $this->authorFactory = $authorFactory;
        $this->authorResource = $authorResource;
        $this->authorCollectionFactory = $authorCollectionFactory;
        $this->searchResultFactory = $searchResultFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @param int $authorId
     * @return AuthorInterface
     */
    public function getById(int $authorId): AuthorInterface
    {
        $author = $this->authorFactory->create();
        $this->authorResource->load($author, $authorId);
        return $author;
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return SearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): SearchResultInterface
    {
        $searchResult = $this->searchResultFactory->create();
        $searchResult->setSearchCriteria($searchCriteria);

        $this->collectionProcessor->process($searchCriteria, $collection = $this->authorCollectionFactory->create());
        $searchResult->setTotalCount($collection->getSize());
        $collection->setCurPage($searchCriteria->getCurrentPage());
        $searchResult->setItems($collection->getItems());
        return $searchResult;
    }

    /**
     * @param AuthorInterface $author
     * @return AuthorInterface
     * @throws AlreadyExistsException
     */
    public function save(AuthorInterface $author): AuthorInterface
    {
        $this->authorResource->save($author);
        return $author;
    }

    /**
     * @param AuthorInterface $author
     * @return AuthorInterface
     * @throws AlreadyExistsException
     */
    public function update(AuthorInterface $author): AuthorInterface
    {
        $this->authorResource->save($author);
        return $author;
    }

    /**
     * @param int $authorId
     * @return bool
     * @throws Exception
     */
    public function deleteById(int $authorId): bool
    {
        $author = $this->authorFactory->create();
        $this->authorResource->load($author, $authorId);
        $this->authorResource->delete($author);
        return true;
    }

    /**
     * @param AuthorInterface $author
     * @return bool
     * @throws Exception
     */
    public function delete(AuthorInterface $author): bool
    {
        $authorId = $author->getId();
        $this->authorResource->load($author, $authorId);
        if ($this->authorResource->delete($author)) {
            return true;
        }
        return false;
    }
}
