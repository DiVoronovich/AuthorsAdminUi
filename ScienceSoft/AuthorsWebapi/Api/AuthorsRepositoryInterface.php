<?php
declare(strict_types=1);

namespace ScienceSoft\AuthorsWebapi\Api;

use Magento\Framework\Api\Search\SearchResultInterface;

interface AuthorsRepositoryInterface
{
    /**
     * Get author by id.
     *
     * @param int $authorId
     * @return \ScienceSoft\AuthorsWebapi\Api\AuthorInterface
     */
    public function getById(int $authorId): AuthorInterface;

    /**
     * Get list of authors.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \ScienceSoft\AuthorsWebapi\Api\AuthorInterface[]
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria): SearchResultInterface;

    /**
     * Save author.
     *
     * @param \ScienceSoft\AuthorsWebapi\Api\AuthorInterface $author
     * @return \ScienceSoft\AuthorsWebapi\Api\AuthorInterface
     */
    public function save(\ScienceSoft\AuthorsWebapi\Api\AuthorInterface $author): AuthorInterface;

    /**
     * Update author.
     *
     * @param \ScienceSoft\AuthorsWebapi\Api\AuthorInterface $author
     * @return \ScienceSoft\AuthorsWebapi\Api\AuthorInterface
     */
    public function update(\ScienceSoft\AuthorsWebapi\Api\AuthorInterface $author): AuthorInterface;

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
     * @param \ScienceSoft\AuthorsWebapi\Api\AuthorInterface $author
     * @return bool true on success
     */
    public function delete(\ScienceSoft\AuthorsWebapi\Api\AuthorInterface $author): bool;
}
