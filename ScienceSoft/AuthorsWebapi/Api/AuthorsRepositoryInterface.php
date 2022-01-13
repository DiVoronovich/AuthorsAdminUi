<?php
declare(strict_types=1);

namespace ScienceSoft\AuthorsWebapi\Api;

use Magento\Framework\Api\Search\SearchResultInterface;
use ScienceSoft\AuthorsWebapi\Api\Data\AuthorInterface;

interface AuthorsRepositoryInterface
{
    /**
     * Get author by id.
     *
     * @param int $authorId
     * @return \ScienceSoft\AuthorsWebapi\Api\Data\AuthorInterface
     */
    public function getById(int $authorId): AuthorInterface;

    /**
     * @param string $identity
     * @return AuthorInterface
     */
    public function getByIdentity(string $identity): ?AuthorInterface;

    /**
     * Get list of authors.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \ScienceSoft\AuthorsWebapi\Api\Data\AuthorInterface[]
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria): SearchResultInterface;

    /**
     * Save author.
     *
     * @param \ScienceSoft\AuthorsWebapi\Api\Data\AuthorInterface $author
     * @return \ScienceSoft\AuthorsWebapi\Api\Data\AuthorInterface
     */
    public function save(Data\AuthorInterface $author): AuthorInterface;

    /**
     * Update author.
     *
     * @param \ScienceSoft\AuthorsWebapi\Api\Data\AuthorInterface $author
     * @return \ScienceSoft\AuthorsWebapi\Api\Data\AuthorInterface
     */
    public function update(Data\AuthorInterface $author): AuthorInterface;

    /**
     * Delete customer group by ID.
     *
     * @param int $authorId
     * @return bool true on success
     */
    public function deleteById(int $authorId): bool;

    /**
     * Delete author.
     *
     * @param \ScienceSoft\AuthorsWebapi\Api\Data\AuthorInterface $author
     * @return bool true on success
     */
    public function delete(Data\AuthorInterface $author): bool;
}
