<?php
declare(strict_types=1);

namespace ScienceSoft\AuthorsAdminUi\Controller\Adminhtml\Literature\Image;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Downloadable\Helper\File;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\MediaStorage\Helper\File\Storage\Database;
use Magento\MediaStorage\Model\File\UploaderFactory;

class Upload extends Action implements HttpPostActionInterface
{
    /**
     * @var UploaderFactory
     */
    protected UploaderFactory $uploaderFactory;

    /**
     * @var Database
     */
    private Database $storageDatabase;

    /**
     * Downloadable file helper.
     *
     * @var File
     */
    protected File $fileHelper;

    /**
     * @param UploaderFactory $uploaderFactory
     * @param Context $context
     * @param Database $storageDatabase
     * @param File $fileHelper
     */
    public function __construct(
        UploaderFactory $uploaderFactory,
        Context $context,
        Database $storageDatabase,
        File $fileHelper
    ) {
        parent::__construct($context);
        $this->uploaderFactory = $uploaderFactory;
        $this->storageDatabase = $storageDatabase;
        $this->fileHelper = $fileHelper;
    }

    /**
     * @return ResponseInterface|ResultInterface
     */
    public function execute()
    {
        $uploader = $this->uploaderFactory->create(['fileId' => 'image']);
        $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
        $tmpPath = 'author/tmp';
        $result = $this->fileHelper->uploadFromTmp($tmpPath, $uploader);
        unset($result['tmp_name'], $result['path']);
        if (isset($result['file'])) {
            $relativePath = rtrim($tmpPath, '/') . '/' . ltrim($result['file'], '/');
            $this->storageDatabase->saveFile($relativePath);
        }
        return $this->resultFactory->create(ResultFactory::TYPE_JSON)->setData($result);
    }
}
