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
    public function getId(): ?int;

    /**
     * Set id
     *
     * @param int $id
     * @return $this
     */
    public function setId(int $id): self;

    /**
     * Get name
     *
     * @return string|null
     */
    public function getName(): ?string;

    /**
     * Set name
     *
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self;

    /**
     * Get date
     *
     * @return string|null
     */
    public function getDate(): ?string;

    /**
     * Set date
     *
     * @param string $date
     * @return $this
     */
    public function setDate(string $date): self;

    /**
     * Get status
     *
     * @return int|null
     */
    public function getStatus(): ?int;

    /**
     * Set status
     *
     * @param int $status
     * @return $this
     */
    public function setStatus(int $status): self;

}
