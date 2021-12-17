<?php

namespace ScienceSoft\Authors\Block;

use Magento\Framework\View\Element\Template;
use ScienceSoft\Authors\Model\ResourceModel\Author\Collection;

class Hello extends Template
{
    /**
     * @var Collection
     */
    private $collection;

    /**
     * Hello constructor.
     * @param Template\Context $context
     * @param Collection $collection
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        Collection $collection,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->collection = $collection;
    }

    public function getAllAuthors() {
        return $this->collection;
    }

//    public function getAddAuthorPostUrl() {
//        return $this->getUrl('author/add');
//    }

}
