<?php

class Olelukoie_News_Blocks_Adminhtml_News extends Mage_Adminhtml_Block_Widget_Form_Container
{
    /**
     * Initialize edit form container
     *
     */
    public function __construct()
    {
        $this->_objectId = 'id';
        $this->_blockGroup = 'olelukoie_news';
        $this->_controller = 'adminhtml_news';
        parent::__construct();
        if (Mage::helper('olelukoie_news/Admin')->isActionAllowed('save')) {
            $this->_updateButton('save', 'label', Mage::helper('olelukoie_news')->__('Save News Item'));
            $this->_addButton('saveandcontinue',
                ['label' => Mage::helper('adminhtml')->__('Save and Continue Edit'),
                    'onclick' => 'saveAndContinueEdit()',
                    'class' => 'save',
                ], -100);
        } else {
            $this->_removeButton('save');
        }
        if (Mage::helper('olelukoie_news/Admin')->isActionAllowed('delete')) {
            $this->_updateButton('delete', 'label', Mage::helper('olelukoie_news')->__('Delete News Item'));
        } else {
            $this->_removeButton('delete');
        }
        $this->_formScripts[] = "
        function toggleEditor() {
            if (tinyMCE.getInstanceById('page_content') == null) {
                tinyMCE.execCommand('mceAddControl', false, 'page_content');
            } else {
                tinyMCE.execCommand('mceRemoveControl', false, 'page_content');
            }
        }
        function saveAndContinueEdit(){
            editForm.submit($('edit_form').action+'back/edit/');
        }
    ";
    }

    /**
     * Retrieve text for header element depending on loaded page
     *
     * @return string
     */
    public function getHeaderText()
    {
        $model = Mage::helper('olelukoie_news')->getNewsItemInstance();
        if ($model->getId()) {
            return Mage::helper('olelukoie_news')->__("Edit News Item '%s'", $this->escapeHtml($model->getTitle()));
        } else {
            return Mage::helper('olelukoie_news')->__('New News Item');
        }
    }
}

