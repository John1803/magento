<?php

/**
 * @var Mage_Core_Model_Resource_Setup $installer
 */

$installer = $this;

$table = $installer->getConnection()
    ->newTable($installer->getTable('olelukoie_new/news'))
    ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned' => true,
        'identity' =>true,
        'nullable' =>false,
        'primary' =>true,
    ), 'Entity id')
    ->addColumn('title', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        'nullable' => true,
    ), 'Title')
    ->addColumn('author', Varien_Db_Ddl_Table::TYPE_TEXT, 63, array(
        'nullable' => true,
        'default' => null
    ), 'Author')
    ->addColumn('content', Varien_Db_Ddl_Table::TYPE_TEXT, )
    ->addColumn('image', Varien_Db_Ddl_Table::TYPE_TEXT, '2M', array(), );