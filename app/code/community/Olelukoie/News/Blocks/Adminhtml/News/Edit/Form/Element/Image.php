<?php

/**
 * Custom image form element that generates correct thumbnail image URL
 *
 */

class Olelukoie_News_Blocks_Adminhtml_News_Edit_Form_Element_Image extends Varien_Data_Form_Element_Image
{
    /**
     * Get image preview url
     *
     * @return string
     */
    protected function _getUrl()
    {
        $url = false;
        if ($this->getValue()) {
            $url = Mage::helper('olelukoie_news/image')->getBaseUrl() . DS . $this->getValue();
        }
        return $url;
    }
}