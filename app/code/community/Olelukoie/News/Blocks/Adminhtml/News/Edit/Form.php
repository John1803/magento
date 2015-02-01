<?php

class Olelukoie_News_Blocks_Adminhtml_News_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * Prepare form action
     *
     * @return Olelukoie_News_Blocks_Adminhtml_News_Edit_Form
     */
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form(['id' => 'edit_form',
                                      'action' => $this->getUrl('*/*/save'),
                                      'method' => 'post',
                                      'enctype' => 'multipart/form-data',
        ]);

        $form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();
    }
}


