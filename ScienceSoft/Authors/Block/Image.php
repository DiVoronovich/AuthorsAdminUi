<?php
declare(strict_types=1);

namespace ScienceSoft\Authors\Block;

use Magento\Framework\View\Element\Template;

class Image extends Template
{
    /**
     * @param $img
     * @return string
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getPathImage($img): string
    {
        $baseUrl = $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
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
