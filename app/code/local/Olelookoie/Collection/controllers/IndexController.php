<?php

class Olelookoie_Collection_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $thing_1 = new Varien_Object();
        $thing_1->setName('Richard');
        $thing_1->setAge(24);

        $thing_2 = new Varien_Object();
        $thing_2->setName('Jane');
        $thing_2->setAge(12);

        $thing_3 = new Varien_Object();
        $thing_3->setName('Spot');
        $thing_3->setLastName('The Dog');
        $thing_3->setAge(7);

//        var_dump($thing_1->getName());
//        var_dump($thing_3->getData());
//
        $collectionOfThings = new Varien_Data_Collection();
        $collectionOfThings->addItem($thing_1)
                            ->addItem($thing_2)
                            ->addItem($thing_3);
//
//
//        foreach ($collectionOfThings as $thing) {
//           var_dump($thing->getData());
//        }

//        var_dump($collectionOfThings->getFirstItem()->getData());
//        var_dump($collectionOfThings->getLastItem()->getData());

        var_dump($collectionOfThings->toXml());
    }

    public function testCollectAction()
    {
//
//        $collectionOfProducts = Mage::getModel('catalog/product')
//            ->getCollection();
//        $collectionOfProducts->addFieldToFilter('sku','n2610');
//
//        //another neat thing about collections is you can pass them into the count      //function.  More PHP5 powered goodness
//        echo "Our collection now has " . count($collectionOfProducts) . ' item(s)';
//        var_dump($collectionOfProducts->getFirstItem()->getData());
//        var_dump
//        (
//            Mage::getModel('catalog/product')
//                ->getCollection()
//                ->addAttributeToSelect('meat_title')
//                ->getData()
//        );
//        $collectionOfProducts = Mage::getModel('catalog/product')->getCollection()->addAttributeToSelect('meat_title');
//        var_dump($collectionOfProducts);
//        var_dump((string)$collectionOfProducts);
        echo
        (string)
        Mage::getModel('catalog/product')
            ->getCollection()
            ->addFieldToFilter('sku',array('like'=>'a%'))
            ->addFieldToFilter('sku',array('like'=>'b%'))
            ->getSelect();
    }

    public function goodbyeAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function paramsAction()
    {
        echo '<dl>';
        foreach($this->getRequest()->getParams() as $key=>$value) {
            echo '<dt><strong>Param: </strong>'.$key.'</dt>';
            echo '<dt><strong>Value: </strong>'.$value.'</dt>';
        }
        echo '</dl>';
    }
}