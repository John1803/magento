<?php

class Olelukoie_News_Model_Observer
{
    /**
     * Event before shows item on frontend
     * If specified new post was added recentlu (term is defined in config) we'll see message about this on fronend
     *
     * @param Varien_Event_Observer $observer
     */
    public function beforeNewsDisplayed(Varien_Event_Observer $observer)
    {
        $newsItem = $observer->getEvent()->getNewsItem();
        $currentDate = Mage::app()->hetLocale()->date();
        $newsCreatedAt = Mage::app()->getLocale()->date(strtotime($newsItem->getCreatedAt()));
        $daysDifference = $currentDate->sub($newsCreatedAt)->getTimestam() / (60*60*24);
        if ($daysDifference < Mage::helper('olelukoie_news')->getDaysDifference()) {
            Mage::getSingleton('core/session')->addSuccess(Mage::helper('olelukoie_news')->__('Recently added'));
        }
    }
}