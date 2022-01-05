<?php

namespace ScienceSoft\Authors\Block;

use Magento\Framework\View\Element\Template;
use ScienceSoft\Authors\Model\AuthorFactory;

class Hello extends Template
{
    /**
     * @var AuthorFactory
     */
    private AuthorFactory $authorFactory;

    /**
     * Hello constructor.
     * @param Template\Context $context
     * @param AuthorFactory $authorFactory
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        AuthorFactory $authorFactory,
        array            $data = []
    ) {
        parent::__construct($context, $data);
        $this->authorFactory = $authorFactory;
    }

    public function getAllAuthors()
    {
        return $this->authorFactory->create()->getCollection();
    }
}
