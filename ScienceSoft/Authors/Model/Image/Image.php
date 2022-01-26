<?php
declare(strict_types=1);

namespace ScienceSoft\Authors\Model\Image;

use Magento\Store\Model\StoreManagerInterface;

class Image
{
    private StoreManagerInterface $storeManager;

    /**
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        StoreManagerInterface $storeManager
    ) {
        $this->storeManager = $storeManager;
    }

    /**
     * @param $img
     * @return string
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getPathImage($img): string
    {
        $baseUrl = $this->storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        $tmpPath = $this->getBaseTmpPath();
        return $baseUrl . $tmpPath . $img;
    }

    /**
     * @return string
     */
    public function getBaseTmpPath(): string
    {
        return 'author/tmp';
    }
}
