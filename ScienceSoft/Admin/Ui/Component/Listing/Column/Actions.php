<?php
declare(strict_types=1);

namespace ScienceSoft\Admin\Ui\Component\Listing\Column;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

class Actions extends Column
{
    /**
     * @var UrlInterface
     */
    protected $urlBuilder;

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $name = $this->getData('name');
                if (isset($item['author_id'])) {
                    $item[$name]['edit'] = [
                        'href' => $this->urlBuilder->getUrl('authors/literature_rus/edit', ['id' => $item['author_id']]),
                        'label' => __('Edit'),
                    ];
                    $item[$name]['delete'] = [
                        'href' => $this->urlBuilder->getUrl('authors/literature_rus/delete', ['id' => $item['author_id']]),
                        'label' => __('Delete'),
                    ];
                }
            }
        }

        return $dataSource;
    }
}
