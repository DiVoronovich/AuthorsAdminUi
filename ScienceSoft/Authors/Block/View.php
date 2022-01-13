<?php
declare(strict_types=1);

namespace ScienceSoft\Authors\Block;

use Magento\Backend\App\Action;
use Magento\Framework\Api\Search\DocumentInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\View\Element\Template\Context;
use ScienceSoft\Authors\Model\AuthorFactory;
use Magento\Framework\View\Element\Template;
use ScienceSoft\AuthorsWebapi\Api\Data\AuthorInterface;
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
     * View constructor.
     * @param Context $context
     * @param AuthorFactory $authorFactory
     * @param Action $action
     * @param AuthorRepository $authorRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param array $data
     */
    public function __construct(
        Context $context,
        AuthorFactory $authorFactory,
        Action $action,
        AuthorRepository $authorRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->authorFactory = $authorFactory;
        $this->action = $action;
        $this->authorRepository = $authorRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * @return AuthorInterface
     */
    public function getAuthor(): AuthorInterface
    {
        $identity = $this->action->getRequest()->getParam('identity');
        return $this->authorRepository->getByIdentity($identity);
    }
}
