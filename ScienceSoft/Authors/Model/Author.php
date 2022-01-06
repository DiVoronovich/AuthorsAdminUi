<?php

namespace ScienceSoft\Authors\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use ScienceSoft\Authors\Model\ResourceModel\Author as ResourceModel;
use ScienceSoft\AuthorsWebapi\Api\AuthorInterface;

class Author extends AbstractExtensibleModel implements AuthorInterface
{
    /**#@+
     * Constants defined for keys of  data array
     */
    const AUTHOR_ID = 'author_id';

    const NAME = 'name';

    const SURNAME = 'surname';

    const DATE = 'date';

    const STATUS = 'status';

    const IDENTITY = 'identity';

    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    /**
     * Set author name
     *
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Get author name
     *
     * @return string|null
     * @codeCoverageIgnoreStart
     */
    public function getName(): ?string
    {
        return $this->getData(self::NAME);
    }

    /**
     * Set author surname
     *
     * @param string $surname
     * @return $this
     */
    public function setSurname(string $surname): self
    {
        return $this->setData(self::SURNAME, $surname);
    }

    /**
     * Get author surname
     *
     * @return string|null
     * @codeCoverageIgnoreStart
     */
    public function getSurname(): ?string
    {
        return $this->getData(self::SURNAME);
    }

    /**
     * Set author Id
     *
     * @param int $id
     * @return $this
     * @since 101.0.0
     */
    public function setId($id): self
    {
        return $this->setData(self::AUTHOR_ID, $id);
    }

    /**
     * Get author id
     *
     * @return int
     */
    public function getId(): ?int
    {
        $id = $this->getData(self::AUTHOR_ID);

        if (!$id) {
            return null;
        }

        return $id;
    }

    /**
     * Set author date
     *
     * @param string $date
     * @return $this
     */
    public function setDate(string $date): self
    {
        return $this->setData(self::DATE, $date);
    }

    /**
     * Get author date
     *
     * @return string|null
     */
    public function getDate(): ?string
    {
        return $this->_getData(self::DATE);
    }

    /**
     * Set author status
     *
     * @param int $status
     * @return $this
     */
    public function setStatus(int $status): self
    {
        return $this->setData(self::STATUS, $status);
    }

    /**
     * Get author status
     *
     * @return int|null
     */
    public function getStatus(): ?int
    {
        return $this->_getData(self::STATUS);
    }

    /**
     * Set author identity
     *
     * @param string $identity
     * @return $this
     */
    public function setIdentity(string $identity): self
    {
        return $this->setData(self::IDENTITY, $identity);
    }

    /**
     * Get author identity
     *
     * @return string|null
     * @codeCoverageIgnoreStart
     */
    public function getIdentity(): ?string
    {
        return $this->getData(self::IDENTITY);
    }
}
