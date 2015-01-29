<?php

class Olelukoie_News_Model_Resource_News_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct()
    {
        $this->_init('olelukoie_nes/news');
    }

    /**
     * @param integer $page
     * @return Olelukoie_News_Model_Resource_News_Collection
     */

    public function prepareForList($page)
    {
        $this->setPageSize(Mage::helper('olelukoie_news')->getNewsPerPage());
        $this->setCurPage($page)->setOrder('published_at', Varien_Data_Collection::SORT_ORDER_DESC);
        return $this;
    }
}