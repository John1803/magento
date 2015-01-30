<?php

class Olelukoie_News_Helper_Image extends Mage_Core_Helper_Abstract
{
    /**
     * Media path to extension images
     *
     *@vat string
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
    protected  $_imageSize = [
        'minheight' => self::MIN_HEIGHT,
        'maxheight' => self::MAX_HEIGHT,
        'minwidth' => self::MIN_WIDTH,
        'maxwidth' => self::MAX_WIDTH
    ];

}