<?php

class Olelookoie_Complexworld_IndexController extends Mage_Core_Controller_Front_Action
{
    public function testEAVAction()
    {
        echo 'SetUp';
    }

    public function indexAction()
    {
        $eavBlog = Mage::getModel('complexworld/eavblogpost');
        $eavBlog->load(1);
    }

    public function populateEntriesAction()
    {
        for ($i=0;$i<10;$i++) {
            $eavBlog = Mage::getModel('complexworld/eavblogpost');
            $eavBlog->setTitle('This is a test '.$i);
            $eavBlog->setContent('This is test content '.$i);
            $eavBlog->setDate(now());
            $eavBlog->save();
        }

        echo 'DONE';
    }

    public function showCollectionAction()
    {
        $eavBlog = Mage::getModel('complexworld/eavblogpost');
        $entries = $eavBlog->getCollection()
            ->addAttributeToSelect('title')
            ->addAttributeToSelect('content');
        $entries->load();
        foreach ($entries as $entry) {
            echo '<h2>' . $entry->getTitle() . '</h2>';
            echo '<h2>' . $entry->getDate() . '</h2>';
            echo '<h2>' . $entry->getContent() . '</h2>';

        }

        echo 'Done';
    }
}