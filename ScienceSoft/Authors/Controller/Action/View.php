<?php

namespace ScienceSoft\Authors\Controller\Action;

use Magento\Backend\App\Action;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use ScienceSoft\AuthorsWebapi\Model\AuthorRepository;

class View implements ActionInterface
{
    /**
     * @var ResultFactory
     */
    private ResultFactory $resultFactory;
    private Action $action;
    private AuthorRepository $authorRepository;

    /**
     * @param ResultFactory $resultFactory
     * @param Action $action
     * @param AuthorRepository $authorRepository
     */
    public function __construct(ResultFactory $resultFactory)
    {
        $this->resultFactory = $resultFactory;
    }

    /**
     * @return ResultInterface
     */
    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
