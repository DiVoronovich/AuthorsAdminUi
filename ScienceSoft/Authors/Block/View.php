<?php
declare(strict_types=1);

namespace ScienceSoft\Authors\Block;

use Magento\Backend\App\Action;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\View\Element\Template;
use ScienceSoft\AuthorsWebapi\Api\Data\AuthorInterface;
use ScienceSoft\AuthorsWebapi\Model\AuthorRepository;

class View extends Template
{
    /**
     * @var Action
     */
    private Action $action;

    /**
     * @var AuthorRepository
     */
    private AuthorRepository $authorRepository;

    /**
     * View constructor.
     *
     * @param Context $context
     * @param Action $action
     * @param AuthorRepository $authorRepository
     * @param array $data
     */
    public function __construct(
        Context $context,
        Action $action,
        AuthorRepository $authorRepository,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->action = $action;
        $this->authorRepository = $authorRepository;
    }

    /**
     * View one author
     *
     * @return null|AuthorInterface
     */
    public function getAuthor(): ?AuthorInterface
    {
        $identity = $this->action->getRequest()->getParam('identity');
        return $this->authorRepository->getByIdentity($identity);
    }
}
