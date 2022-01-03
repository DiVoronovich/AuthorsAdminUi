<?php
declare(strict_types=1);

namespace ScienceSoft\AuthorsAdminUi\Controller\Adminhtml\Literature\Rus;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use ScienceSoft\AuthorsWebapi\Api\AuthorsRepositoryInterface;

class Listing extends Action implements HttpGetActionInterface
{
    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCriteriaBuilder;

    /**
     * @var Context
     */
    private Context $context;

    /**
     * @var AuthorsRepositoryInterface
     */
    private AuthorsRepositoryInterface $authorsRepository;

    /**
     * @param Context $context
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param AuthorsRepositoryInterface $authorsRepository
     */
    public function __construct(
        Context                    $context,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        AuthorsRepositoryInterface $authorsRepository
    ) {
        parent::__construct($context);
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->context = $context;
        $this->authorsRepository = $authorsRepository;
    }

    public function execute()
    {
        $searchCriteria = $this->searchCriteriaBuilder->addFilter('author_id', 9)->create();
        $author = $this->authorsRepository->getList($searchCriteria)->getItems();
        $a = $this->authorsRepository->getList($searchCriteria);

        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
