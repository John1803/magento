<?php

$installer = $this;
$installer->createEntityTables(
    $this->getTable('complexworld/eavblogpost')
);
$installer->startSetup();
$installer->addEntityType('complexworld_eavblogpost', array(
    //entity_mode is the URI you'd pass into a Mage::getModel() call
    'entity_model'    => 'complexworld/eavblogpost',

    //table refers to the resource URI complexworld/eavblogpost
    //<complexworld_resource>...<eavblogpost><table>eavblog_posts</table>
    'table'           =>'complexworld/eavblogpost',
));
$this->addAttribute('complexworld_eavblogpost', 'title', array(
    //the EAV attribute type, NOT a MySQL varchar
    'type'              => 'varchar',
    'label'             => 'Title',
    'input'             => 'text',
    'class'             => '',
    'backend'           => '',
    'frontend'          => '',
    'source'            => '',
    'required'          => true,
    'user_defined'      => true,
    'default'           => '',
    'unique'            => false,
));
$installer->endSetup();