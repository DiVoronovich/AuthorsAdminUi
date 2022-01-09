<?php
declare(strict_types=1);

namespace ScienceSoft\Authors\Block;

use Magento\Backend\App\Action;
use Magento\Framework\Api\SearchCriteriaBuilder;
use ScienceSoft\Authors\Model\AuthorFactory;
use Magento\Framework\View\Element\Template;
use ScienceSoft\AuthorsWebapi\Model\AuthorRepository;

class View extends Template
{
    /**
     * @var AuthorFactory
     */
    private AuthorFactory $authorFactory;

    /**
     * @var Action
     */
    private Action $action;

    /**
     * @var AuthorRepository
     */
    private AuthorRepository $authorRepository;

    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCriteriaBuilder;


    /**
     * Hello constructor.
     * @param Template\Context $context
     * @param AuthorFactory $authorFactory
     * @param Action $action
     * @param AuthorRepository $authorRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        AuthorFactory    $authorFactory,
        Action           $action,
        AuthorRepository $authorRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        array            $data = []
    ) {
        parent::__construct($context, $data);
        $this->authorFactory = $authorFactory;
        $this->action = $action;
        $this->authorRepository = $authorRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    public function getAllAuthors()
    {
        return $this->authorFactory->create()->getCollection();
    }

    public function getAuthor()
    {
        $identity = $this->action->getRequest()->getParam('identity');
        $searchCriteria = $this->searchCriteriaBuilder->addFilter('identity', $identity)->create();
        return $this->authorRepository->getList($searchCriteria)->getItems();
    }
}
