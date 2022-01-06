<?php
declare(strict_types=1);

namespace ScienceSoft\Authors\Block;

use Magento\Backend\App\Action;
use ScienceSoft\Authors\Model\AuthorFactory;
use Magento\Framework\View\Element\Template;
use ScienceSoft\AuthorsWebapi\Api\AuthorInterface;
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
     * Hello constructor.
     * @param Template\Context $context
     * @param AuthorFactory $authorFactory
     * @param Action $action
     * @param AuthorRepository $authorRepository
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        AuthorFactory    $authorFactory,
        Action           $action,
        AuthorRepository $authorRepository,
        array            $data = []
    ) {
        parent::__construct($context, $data);
        $this->authorFactory = $authorFactory;
        $this->action = $action;
        $this->authorRepository = $authorRepository;
    }

    public function getAllAuthors()
    {
        return $this->authorFactory->create()->getCollection();
    }

    public function getAuthor(): AuthorInterface
    {
        $id = $this->action->getRequest()->getParam('id');
        return $this->authorRepository->getById((int)$id);
    }
}
