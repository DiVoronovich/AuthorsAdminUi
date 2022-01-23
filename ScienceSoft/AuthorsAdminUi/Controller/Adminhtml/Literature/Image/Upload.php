<?php
declare(strict_types=1);

namespace ScienceSoft\AuthorsAdminUi\Controller\Adminhtml\Literature\Image;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Downloadable\Helper\File;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\Result\RawFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\MediaStorage\Helper\File\Storage\Database;
use Magento\MediaStorage\Model\File\UploaderFactory;
use ScienceSoft\Authors\Block\Image;

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
     * @var RawFactory
     */
    protected $resultRawFactory;

    /**
     * @var Image
     */
    private Image $image;

    /**
     * @param UploaderFactory $uploaderFactory
     * @param Context $context
     * @param Database $storageDatabase
     * @param File $fileHelper
     * @param RawFactory $resultRawFactory
     * @param Image $image
     */
    public function __construct(
        UploaderFactory $uploaderFactory,
        Context $context,
        Database $storageDatabase,
        File $fileHelper,
        RawFactory $resultRawFactory,
        Image $image
    ) {
        parent::__construct($context);
        $this->uploaderFactory = $uploaderFactory;
        $this->storageDatabase = $storageDatabase;
        $this->fileHelper = $fileHelper;
        $this->resultRawFactory = $resultRawFactory;
        $this->image = $image;
    }

    /**
     * @return \Magento\Framework\Controller\Result\Raw
     * @throws \Magento\Framework\Exception\NoSuchEntityException
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
        $result['url'] = $this->image->getPathImage('/' . $result['file']);
        return $this->resultFactory->create(ResultFactory::TYPE_JSON)->setData($result);
    }
}
