<?php
declare(strict_types=1);

namespace ScienceSoft\Authors\Controller\Index;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;

/**
 * View class.
 * Shows page of author.
 */
class View implements ActionInterface
{
    /**
     * @var ResultFactory
     */
    private ResultFactory $resultFactory;

    /**
     * @param ResultFactory $resultFactory
     */
    public function __construct(ResultFactory $resultFactory)
    {
        $this->resultFactory = $resultFactory;
    }

    /**
     * @return ResultInterface
     */
    public function execute(): ResultInterface
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
