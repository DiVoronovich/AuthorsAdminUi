<?php
declare(strict_types=1);

namespace ScienceSoft\Authors\Block;

use Magento\Framework\Api\Search\DocumentInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use ScienceSoft\AuthorsWebapi\Model\AuthorRepository;

class Listing extends Template
{
    /**
     * @var AuthorRepository
     */
    private AuthorRepository $authorRepository;

    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchBuilder;

    /**
     * Listing constructor.
     *
     * @param Context $context
     * @param AuthorRepository $authorRepository
     * @param SearchCriteriaBuilder $searchBuilder
     * @param array $data
     */
    public function __construct(
        Context $context,
        AuthorRepository $authorRepository,
        SearchCriteriaBuilder $searchBuilder,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->authorRepository = $authorRepository;
        $this->searchBuilder = $searchBuilder;
    }

    /**
     * Get all authors
     *
     * @return DocumentInterface[]
     */
    public function getAllAuthors(): array
    {
        $searchCriteria = $this->searchBuilder->addFilters([])->create();
        return $this->authorRepository->getList($searchCriteria)->getItems();
    }
}
