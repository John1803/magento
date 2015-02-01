<?php

 /**
  * News List Admin edit form content tab
  */

class Olelukoie_News_Blocks_Adminhtml_News_Edit_Tab_Content extends Mage_Adminhtml_Block_Widget_Form
    implements Mage_Adminhtml_Block_Widget_Tab_Interface
{
    /**
     * Load WYSIWYG on demand and prepare layout
     *
     * @return Olelukoie_News_Blocks_Adminhtml_News_Edit_Tab_Content
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
            $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
        }
        return $this;
    }
    /**
     * Prepares tab form
     *
     * @return Mage_Adminhtml_Block_Widget_Form
     */
    protected function _prepareForm()
    {
        $model = Mage::helper('olelukoie_news')->getNewsItemInstance();
        /**
         * Checking if user have permissions to save information
         */
        if (Mage::helper('olelukoie_news/Admin')->isActionAllowed('save')) {
            $isElementDisabled = false;
        } else {
            $isElementDisabled = true;
        }
        $form = new Varien_Data_Form();
        $form->setHtmlIdPrefix('news_content_');

        $fieldset = $form->addFieldset('content_fieldset', ['legend' => Mage::helper('olelukoie_news')->__('Content'),
                                                            'class' => 'fieldset-wide']);
        $wysiwygConfig = Mage::getSingleton('cms/wysiwyg_config')->getConfig(['tab_id' => $this->getTabId()]);
        $contentField = $fieldset->addField('content', 'editor', ['name' => 'content',
                                                                  'style' => 'height:36em;',
                                                                  'required' => true,
                                                                  'disabled' => $isElementDisabled,
                                                                  'config'   => $wysiwygConfig
        ]);

        // Setting custom renderer for content field to remove label column
        $renderer = $this->getLayout()->createBlock('adminhtml/widget_form_renderer_fieldset_element')
                                        ->setTemplate('cms/page/edit/form/renderer/content.phtml');
        $contentField->setRenderer($renderer);
        $form->setValues($model->getData());
        $this->setForm($form);
        Mage::dispatchEvent('adminhtml_news_edit_tab_content_prepare_form', ['form' => $form]);
        return parent::_prepareForm();
    }
    /**
     * Prepare label for tab
     *
     * @return string
     */
    public function getTabLabel()
    {
        return Mage::helper('olelukoie_news')->__('Content');
    }
    /**
     * Prepare title for tab
     *
     * @return string
     */
    public function getTabTitle()
    {
        return Mage::helper('olelukoie_news')->__('Content');
    }
    /**
     * Returns status flag about this tab can be shown or not
     * @return true
     */
    public function canShowTab()
    {
        return true;
    }
    /**
     * Returns status flag about this tab hidden or not
     *
     * @return true
     */
    public function isHidden()
    {
        return false;
    }
}