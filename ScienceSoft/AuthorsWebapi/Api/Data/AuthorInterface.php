<?php
declare(strict_types=1);

namespace ScienceSoft\AuthorsWebapi\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface AuthorInterface extends ExtensibleDataInterface
{
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
     * Get surname
     *
     * @return string|null
     */
    public function getSurname(): ?string;

    /**
     * Set surname
     *
     * @param string|null $surname
     * @return $this
     */
    public function setSurname(?string $surname): self;

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

    /**
     * Get identity
     *
     * @return string|null
     */
    public function getIdentity(): ?string;

    /**
     * Set identity
     *
     * @param string $identity
     * @return $this
     */
    public function setIdentity(string $identity): self;

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \ScienceSoft\AuthorsWebapi\Api\Data\AuthorExtensionInterface
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     *
     * @param  \ScienceSoft\AuthorsWebapi\Api\Data\AuthorExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(\ScienceSoft\AuthorsWebapi\Api\Data\AuthorExtensionInterface $extensionAttributes);
}
