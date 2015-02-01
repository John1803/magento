<?php

 /**
  *  News List Admin edit form tabs block
  */


class Olelukoie_News_Blocks_Adminhtml_News_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    /**
     * Initialize tabs and define tabs block settings
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('page_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('olelukoie_news')->__('News Item Info'));
    }
}
