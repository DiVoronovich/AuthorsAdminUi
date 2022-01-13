<?php
declare(strict_types=1);

namespace ScienceSoft\Authors\Plugin;

use ScienceSoft\AuthorsWebapi\Api\Data\AuthorInterface;
use ScienceSoft\AuthorsWebapi\Api\Data\AuthorExtensionInterface;
use ScienceSoft\AuthorsWebapi\Api\Data\AuthorExtensionFactory;

class AuthorAttributeLoad
{
    /**
     * @var AuthorExtensionFactory
     */
    private AuthorExtensionFactory $extensionFactory;

    /**
     * @param AuthorExtensionFactory $extensionFactory
     */
    public function __construct(AuthorExtensionFactory $extensionFactory)
    {
        $this->extensionFactory = $extensionFactory;
    }

    /**
     * Loads author entity extension attributes
     *
     * @param AuthorInterface $entity
     * @param AuthorExtensionInterface|null $extension
     * @return AuthorExtensionInterface
     */
    public function afterGetExtensionAttributes(
        AuthorInterface $entity,
        AuthorExtensionInterface $extension = null
    ): ?AuthorExtensionInterface {
        if ($extension === null) {
            $extension = $this->extensionFactory->create();
        }

        return $extension;
    }
}
