<?php
declare(strict_types=1);

namespace ScienceSoft\Authors\ViewModel;

use Magento\Backend\App\Action;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
//use ScienceSoft\Authors\Block\Image;
use ScienceSoft\Authors\Model\Image\Image;
use ScienceSoft\AuthorsWebapi\Api\Data\AuthorInterface;
use ScienceSoft\AuthorsWebapi\Model\AuthorRepository;

class View implements ArgumentInterface
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
     * @var ScopeConfigInterface
     */
    private ScopeConfigInterface $scopeConfig;

    /**
     * View constructor.
     *
     * @param Action $action
     * @param AuthorRepository $authorRepository
     * @param ScopeConfigInterface $scopeConfig
     * @param Image $image
     */
    public function __construct(
        Action $action,
        AuthorRepository $authorRepository,
        ScopeConfigInterface $scopeConfig,
        Image $image
    ) {
        $this->action = $action;
        $this->authorRepository = $authorRepository;
        $this->image = $image;
        $this->scopeConfig = $scopeConfig;
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

    /**
     * Get title for page of author
     *
     * @return string
     */
    public function getTitleOfAuthorPage(): string
    {
        return $this->scopeConfig->getValue(
            'author_page/title/display_text',
            \Magento\Store\Model\ScopeInterface::SCOPE_WEBSITE
        );
    }
}
