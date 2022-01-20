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
     * @var Image
     */
    private Image $image;

    /**
     * View constructor.
     *
     * @param Context $context
     * @param Action $action
     * @param AuthorRepository $authorRepository
     * @param Image $image
     * @param array $data
     */
    public function __construct(
        Context $context,
        Action $action,
        AuthorRepository $authorRepository,
        Image $image,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->action = $action;
        $this->authorRepository = $authorRepository;
        $this->image = $image;
    }

    /**
     * View one author
     *
     * @return null|AuthorInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getAuthor(): ?AuthorInterface
    {
        $identity = $this->action->getRequest()->getParam('identity');
        $author = $this->authorRepository->getByIdentity($identity);
        $pathImage = $this->image->getPathImage($author->getImage());
        $author->setImage($pathImage);
        return $author;
    }
}
