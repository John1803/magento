<?php

class Olelukoie_News_Adminhtml_NewsController extends Mage_Adminhtml_Controller_Action
{
    /**
     * Init actions
     *
     * @return Olelukoie_News_Adminhtml_NewsController
     */
    protected function _initAction()
    {
        //load layout, set active menu and breadcrumbs
        $this->loadLayout()
                            ->_setActiveMenu('news/manage')
                            ->_addBreadcrumb(
                                Mage::helper('olelukoie_news')->__('News'),
                                Mage::helper('olelukoie_news')->__('News')
                                )
                            ->_addBreadcrumb(
                                Mage::helper('olelukoie_news')->__('Manage News'),
                                Mage::helper('olelukoie_news')->__('Manage News')
                                )
        ;

        return $this;
    }

    /**
     * Index action
     */

    public function indexAction()
    {
        $this->_title($this->__('News'))
            ->_title($this->__('Manage News'))
        ;

        $this->_initAction();
        $this->renderLayout();
    }

    /**
     * Create new News item
     */

    public function newAction()
    {
        $this->_forward('edit');
    }

    /**
     * Edit News action
     */

    public function editAction()
    {
        $this->_title($this->__('News'))
                ->_title($this->__('Manage News'))
        ;

        //Instance new model
        /**
         * @var Olelukoie_News_Model_News $model
         */
        $model = Mage::getModel('olelukoie_news/news');

        //If ID exist, check it and load data
        $newsId = $this->getRequest()->getParam('id');
        if ($newsId) {
            $model->load($newsId);
            if (!$model->getId()) {
                $this->_getSession()->addError(
                    Mage::helper('olelukoie_news')->__('News item does not exist.')
                );
                return $this->_redirect('*/*/');
            }

            // Prepare title
            $this->_title($model->getTitle());
            $breadCrumb = Mage::helper('olelukoie_news')->__('Edit Item');
        } else {
            $this->_title(Mage::helper('olelukoie_news')->__('News Item'));
            $breadCrumb = Mage::helper('olelukoie_news')->__('News Item');
        }

        //Init breadcrumb
        $this->_initAction()->_addBreadcrumb($breadCrumb, $breadCrumb);

        //Set entered data if there was an error during save
        $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
        if (!empty($data)) {
            $model->addData($data);
        }

        //REGISTER MODEL TO USE LATER IN BLOCKS
        Mage::register('news_item', $model);

        //RENDER LAYOUT
        $this->renderLayout();
    }

}