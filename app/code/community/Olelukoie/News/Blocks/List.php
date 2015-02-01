<?php

class Olelukoie_News_Block_List extends Mage_Core_Block_Template
{
    /**
     * @var Olelukoie_News_Model_Resource_News_Collection $_newCollection
     */
    protected $_newsCollection = null;

    /**
     * Retrive news collection
     *
     * @return Olelukoie_News_Model_Resource_News_Collection
     */
    protected function _getCollection()
    {
        return Mage::getResourceModel('olelukoie_news/news_collection');
    }

    /**
     * Retrive prepared news collection
     *
     * @return Olelukoie_News_Model_Resource_News_Collection
     */
    public function getCollection()
    {
        if (is_null($this->_newsCollection)) {
            $this->_newsCollection = $this->_getCollection();
            $this->_newsCollection->prepareForList($this->getCurrentPage());
        }

        return $this->_newsCollection;
    }

    /**
     * Return URL to item's view page
     *
     * @param Olelukoie_News_Model_News $newsItem
     * @return string
     */
    public function getItemUrl($newsItem)
    {
        return $this->getUrl('*/*/view', array('id' => $newsItem->getId()));
    }

    /**
     * Fetch the current page for the news list
     *
     * @return int
     */
    public function getCurrentPage()
    {
        return $this->getData('current_page') ? $this->getData('current_Page') : 1;
    }

    /**
     * Get a pager
     *
     * @return string|null
     */
    public function getPager()
    {
        $pager = $this->getChild('news_list_pager');
        if ($pager) {
            $newsPerPage = Mage::helper('olelukoie_news')->getNewsPerPage();

            $pager->setAvailableLimit(array($newsPerPage => $newsPerPage));
            $pager->setTotalNum($this->getCollection()->getSize());
            $pager->setCollection($this->getCollection());
            $pager->setShowPerPage(true);

            return $pager->toHtml();
        }

        return null;
    }

    /**
     * Return URL resized News Item image
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