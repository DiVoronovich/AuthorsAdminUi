<?php
declare(strict_types=1);

namespace ScienceSoft\Authors\ViewModel;

use Magento\Framework\Api\Search\DocumentInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use ScienceSoft\AuthorsWebapi\Model\AuthorRepository;
use Magento\Framework\Event\ManagerInterface as EventManager;

class Listing implements ArgumentInterface
{
    /**
     * @var AuthorRepository
     */
    private AuthorRepository $authorRepository;

    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchBuilder;

    private EventManager $eventManager;

    /**
     * @param AuthorRepository $authorRepository
     * @param SearchCriteriaBuilder $searchBuilder
     */
    public function __construct(
        AuthorRepository $authorRepository,
        SearchCriteriaBuilder $searchBuilder,
        EventManager $eventManager
    ) {
        $this->authorRepository = $authorRepository;
        $this->searchBuilder = $searchBuilder;
        $this->eventManager = $eventManager;
    }

    /**
     * Get all authors
     *
     * @return DocumentInterface[]
     */
    public function getAllAuthors(): array
    {
        $searchCriteria = $this->searchBuilder->addFilters([])->create();
        $this->eventManager->dispatch('test_event');
        return $this->authorRepository->getList($searchCriteria)->getItems();
    }
}
