<?php

class Olelukoie_News_Model_News extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('olelukoie_news/news');
    }

    /**
     * @return Olelukoie_News_Model_News
     */
    protected function _beforeSave()
    {
        parent::_beforeSave();
        if ($this->isObjectNew()) {
            $this->setData('created_at', Varien_Date::now());
        }
        return $this;
    }
}