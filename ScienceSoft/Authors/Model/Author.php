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

    const DATE = 'date';

    const STATUS = 'status';

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
    public function setName(string $name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Get author name
     *
     * @return string|null
     * @codeCoverageIgnoreStart
     */
    public function getName()
    {
        return $this->_getData(self::NAME);
    }

    /**
     * Set author Id
     *
     * @param int $id
     * @return $this
     * @since 101.0.0
     */
    public function setId($id)
    {
        return $this->setData(self::AUTHOR_ID, $id);
    }

    /**
     * Get author id
     *
     * @return int
     */
    public function getId()
    {
        return $this->_getData(self::AUTHOR_ID);
    }

    /**
     * Set author date
     *
     * @param string $date
     * @return $this
     */
    public function setDate(string $date)
    {
        return $this->setData(self::DATE, $date);
    }

    /**
     * Get author date
     *
     * @return string|null
     */
    public function getDate()
    {
        return $this->_getData(self::DATE);
    }

    /**
     * Set author status
     *
     * @param int $status
     * @return $this
     */
    public function setStatus(int $status)
    {
        return $this->setData(self::STATUS, $status);
    }

    /**
     * Get author status
     *
     * @return int|null
     */
    public function getStatus()
    {
        return $this->_getData(self::STATUS);
    }

}
