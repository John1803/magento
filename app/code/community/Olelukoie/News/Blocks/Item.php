<?php

class Olelukoie_News_Block_Item extends Mage_Core_Block_Template
{
    /**
     * Current news item instance
     *
     * @var Olelukoie_News_Model_News $_item
     */
    protected $_item;

    /**
     * Return parameters for back url
     *
     * @param array $additionalParams
     * @return array
     */
    protected function _getBackUrlParams($additionalParams = [])
    {
        return array_merge(array('p' => $this->getPage()), $additionalParams);
    }

    /**
     * Return URL to the news list page
     *
     * @return string
     */
    protected function getBackUrl()
    {
        return $this->getUrl('*/', array('_query' => $this->_getBackUrlParams()));
    }

    /**
     * Return URL fot resized News Item image
     *
     * @param Olelukoie_News_Model_News $item
     * @param integer $width
     * @return string|false
     */

    public function getImageUrl($item, $width)
    {
        return Mage::helper('olelukoie_news/image')->resize($item, $width);
    }
}