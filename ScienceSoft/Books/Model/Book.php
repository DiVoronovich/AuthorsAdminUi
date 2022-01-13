<?php
declare(strict_types=1);

namespace ScienceSoft\Books\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use ScienceSoft\Books\Model\ResourceModel\Book as ResourceModel;
use ScienceSoft\BooksWebapi\Api\Data\BookInterface;

class Book extends AbstractExtensibleModel implements BookInterface
{
    /**#@+
     * Constants defined for keys of  data array
     */
    const BOOK_NAME = 'book_name';

    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    /**
     * Set name of the book
     *
     * @param string $name
     * @return $this
     */
    public function setBookName(string $name): self
    {
        return $this->setData(self::BOOK_NAME, $name);
    }

    /**
     * Get name of the author
     *
     * @return string|null
     */
    public function getBookName(): ?string
    {
        return $this->getData(self::BOOK_NAME);
    }
}
