<?php
declare(strict_types=1);

namespace ScienceSoft\AuthorsAdminUi\Model\Authors;

use Magento\Ui\DataProvider\AbstractDataProvider;
use ScienceSoft\Authors\Model\ResourceModel\Author\CollectionFactory;

class DataProvider extends AbstractDataProvider
{
    /**
     * @var string[]
     */
    private array $loadedData;

    /**
     * DataProvider constructor.
     *
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        string $name,
        string $primaryFieldName,
        string $requestFieldName,
        CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
    }

    /**
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();
        foreach ($items as $page) {
            $this->loadedData[$page->getId()] = $page->getData();
        }

        if ($items) {
            return $this->loadedData;
        }

        return [];
    }
}
