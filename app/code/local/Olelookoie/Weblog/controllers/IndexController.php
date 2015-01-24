<?php

class Olelookoie_Weblog_IndexController extends Mage_Core_Controller_Front_Action
{
    public function testModelAction()
    {
        $blogPost = Mage::getModel('weblog/blogpost');
        echo get_class($blogPost);
    }
}