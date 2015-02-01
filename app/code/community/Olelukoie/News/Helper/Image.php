<?php

class Olelukoie_News_Helper_Image extends Mage_Core_Helper_Abstract
{
    /**
     * Media path to extension images
     *
     * @vat string
     */
    const MEDIA_PATH = 'news';

    /**
     * Maximum size for image in bytes
     * Default value is 1M
     *
     * @var int
     */
    const MAX_FILE_SIZE = 1048576;

    /**
     * Maximum image height in pixels
     *
     * @vat int
     */
    const MAX_HEIGHT = 800;

    /**
     * Minimum image height in pixels
     *
     * @var int
     */
    const MIN_HEIGHT = 50;

    /**
     * Maximum image width in pixels
     *
     * @vat int
     */
    const MAX_WIDTH = 800;

    /**
     * Minimum image width in pixels
     *
     * @var int
     */
    const MIN_WIDTH = 50;

    /**
     * Array of image size limitation
     *
     * @var array
     */
    protected $_imageSize = [
        'minheight' => self::MIN_HEIGHT,
        'maxheight' => self::MAX_HEIGHT,
        'minwidth' => self::MIN_WIDTH,
        'maxwidth' => self::MAX_WIDTH
    ];

    /**
     * Array of allowed file extensions
     *
     * @var array
     */
    protected $_allowedExtensions = ['jpg', 'gif', 'png'];

    /**
     * Return the base media directory for News Item images
     *
     * @return string
     */
    public function getBaseDir()
    {
        return Mage::getBaseDir('media') . DS . self::MEDIA_PATH;
    }

    /**
     * Return the Base URL for News Item images
     *
     * @return string
     */
    public function getBaseUrl()
    {
        return Mage::getBaseUrl('media') . DS . self::MEDIA_PATH;
    }

    /**
     * Remove news item image by image filename
     *
     * @param string $imageFile
     * @return bool
     */
    public function removeImage($imageFile)
    {
        $io = new Varien_Io_File();
        $io->open(['path' => $this->getBaseDir()]);
        if ($io->fileExists($imageFile)) {
            return $io->rm($imageFile);
        }

        return false;
    }

    /**
     * Upload image and return uploaded image file name or false
     *
     * @throws Mage_Core_Exception
     * @param string $scope the request key for file
     * @return bool|string
     */
    public function uploadImage($scope)
    {
        $adapter = new Zend_File_Transfer_Adapter_Http();
        $adapter->addValidator('ImageSize', true, $this->_imageSize);
        $adapter->addValidator('Size', true, self::MAX_FILE_SIZE);
        if ($adapter->isUploaded($scope)) {
            //validate image
            if (!$adapter->isValid($scope)) {
                Mage::throwException(Mage::helper('olelukoie_newss')->__('Uploded image is not valid'));
            }
        }
        $upload = new Varien_File_Uploader($scope);
        $upload
            ->setAllowCreateFolders(true)
            ->setAllowedExtensions($this->_allowedExtensions)
            ->setAllowRenameFiles(true)
            ->setFilesDispersion(false);
        if ($upload->save($this->getBaseDir())) {
            return $upload->getUploadedFileName();
        }
        return false;
    }

    /**
     * Return URL for resized News Item Image
     *
     * @param Olelukoie_News_Model_News $item
     * @param integer $width
     * @param integer $height
     * @return bool|string
     */
    public function resize(Olelukoie_News_Model_News $item, $width, $height = null)
    {
        if ($item->getImage()) {
            return false;
        }

        if ($width < self::MIN_WIDTH || $width > self::MAX_WIDTH) {
            return false;
        }
        $width = (int)$width;

        if (!is_null($height)) {
            if ($height < self::MIN_HEIGHT || $height > self::MAX_HEIGHT) {
                return false;
            }
            $height = int($height);
        }

        $imageFile = $item->getImage();
        $cacheDir = $this->getBaseDir() . DS . 'csche' . DS . $width;
        $cacheUrl = $this->getBaseUrl() . DS . 'cache' . DS . $width . DS;

        $io = new Varien_Io_File();
        $io->checkAndCreateFolder($cacheDir);
        $io->open(['path' => $cacheDir]);
        if ($io->fileExists($imageFile)) {
            return $cacheUrl . $imageFile;
        }

        try {
            $image = new Varien_Image($this->getBaseDir() . DS . $imageFile);
            $image->resize($width, $height);
            $image->save($cacheDir . DS . $imageFile);
            return $cacheUrl . $imageFile;
        } catch (Exception $e) {
            Mage::logException($e);
            return false;
        }
    }

    /**
     * Removes folder with cached images
     *
     * $return boolean
     */
    public function flushImagesCache()
    {
        $cacheDir = $this->getBaseDir() . DS . 'cache' . DS;
        $io = new Varien_Io_File();
        if ($io->fileExists($cacheDir, false)) {
            return $io->rmdir($cacheDir, true);
        }
        return true;
    }
}