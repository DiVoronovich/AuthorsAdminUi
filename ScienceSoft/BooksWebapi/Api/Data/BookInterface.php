<?php
declare(strict_types=1);

namespace ScienceSoft\BooksWebapi\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface BookInterface extends ExtensibleDataInterface
{
    /**
     * Set name of the book
     *
     * @param string $name
     * @return $this
     */
    public function setBookName(string $name): self;

    /**
     * Get name of the book
     *
     * @return string|null
     */
    public function getBookName(): ?string;
}
