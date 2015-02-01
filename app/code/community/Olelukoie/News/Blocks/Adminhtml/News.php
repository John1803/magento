<?php

class Olelukoie_News_Blocks_Adminhtml_News extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    /**
     * Block constructor
     */
    public function __construct()
    {
        $this->_blockGroup = 'olelukoie_news';
        $this->_controller = 'adminhtml_news';
        $this->_headerText = Mage::helper('olelukoie_news')->__('Manage News');
        parent::__construct();
        if (Mage::helper('olelukoie_news/Admin')->isActionAllowed('save')) {
            $this->_updateButton('add', 'label', Mage::helper('olelukoie_news')->__('Add New News'));
        } else {
            $this->_removeButton('add');
        }
        $this->addButton(
            'news_flush_images_cache',
            ['label' => Mage::helper('olelukoie_news')->__('Flush Images Cache'),
             'onclick' => 'setLocation(\'' . $this->getUrl('*/*/flush') . '\')',
            ]
        );
    }
}