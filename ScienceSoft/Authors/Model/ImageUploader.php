<?php
declare(strict_types=1);

namespace ScienceSoft\Authors\Model;

use Magento\Framework\Api\Data\ImageContentInterface;
use Magento\Framework\Api\Data\ImageContentInterfaceFactory;
use Magento\Framework\Api\ImageProcessor;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Message\ManagerInterface;

class ImageGenerator
{
    /**
     * @var ImageContentInterfaceFactory
     */
    private $contentFactory;
    /**
     * @var ImageProcessor
     */
    private $imageProcessor;
    /**
     * @var ManagerInterface
     */
    private $messageManager;
    /**
     * ImageGenerator constructor.
     *
     * @param ImageContentInterfaceFactory $contentFactory
     * @param ImageProcessor $imageProcessor
     * @param ManagerInterface $messageManager
     */
    public function __construct(
        ImageContentInterfaceFactory $contentFactory,
        ImageProcessor $imageProcessor,
        ManagerInterface $messageManager
    ) {
        $this->contentFactory = $contentFactory;
        $this->imageProcessor = $imageProcessor;
        $this->messageManager = $messageManager;
    }

    /**
     * @param string $photoUrl
     * @param string $identifier
     * @param string $folder
     *
     * @return string
     */
    public function getCustomerPhoto($photoUrl, $identifier, $folder)
    {
        try {
            if (!filter_var($photoUrl, FILTER_VALIDATE_URL)) {
                throw new LocalizedException(__('Invalid URL format'));
            }
            $photo = file_get_contents($photoUrl);
            if (!$photo) {
                throw new LocalizedException(__('Failed to load photo'));
            }
            $photoProperties = getimagesizefromstring($photo);
            $photoExtenstion = substr($photoProperties['mime'], strpos($photoProperties['mime'], '/') + 1);
            /** @var ImageContentInterface $contentDataObject */
            $contentDataObject = $this->contentFactory->create()
                ->setName($identifier . '.' . $photoExtenstion)
                ->setBase64EncodedData(base64_encode($photo))
                ->setType($photoProperties['mime']);
            $filePath = $this->imageProcessor->processImageContent($folder, $contentDataObject);
            return $filePath;
        } catch (LocalizedException $exception) {
            $this->messageManager->addErrorMessage($exception->getMessage());
            return '';
        }
    }
}
