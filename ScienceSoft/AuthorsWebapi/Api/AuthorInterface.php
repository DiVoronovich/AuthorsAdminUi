<?php
declare(strict_types=1);

namespace ScienceSoft\AuthorsWebapi\Api;

use Magento\Framework\Api\ExtensibleDataInterface;

interface AuthorInterface extends ExtensibleDataInterface
{
    /**
     * Get id
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set id
     *
     * @param int $id
     * @return $this
     */
    public function setId(int $id);

    /**
     * Get name
     *
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     *
     * @param string $name
     * @return $this
     */
    public function setName(string $name);

    /**
     * Get date
     *
     * @return string|null
     */
    public function getDate();

    /**
     * Set date
     *
     * @param string $date
     * @return $this
     */
    public function setDate(string $date);

    /**
     * Get status
     *
     * @return int|null
     */
    public function getStatus();

    /**
     * Set status
     *
     * @param int $status
     * @return $this
     */
    public function setStatus(int $status);

}
