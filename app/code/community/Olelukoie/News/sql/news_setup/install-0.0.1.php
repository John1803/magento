<?php


$installer = $this;
$installer->startSetup();
$table = $installer->getConnection()
    ->newTable($installer->getTable('olelukoie_news/news'))
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
    ->addColumn('content', Varien_Db_Ddl_Table::TYPE_TEXT, '2M', array(
        'nullable' =>true,
        'default' => null,
    ), 'Content')
    ->addColumn('image', Varien_Db_Ddl_Table::TYPE_TEXT, '2M', array(
        'nullable' =>true,
        'default' => null,
    ), 'News image media date')
    ->addColumn('published_at', Varien_Db_Ddl_Table::TYPE_DATE, null, array(
        'nullable' =>true,
        'default' => null,
    ), 'World publish day')
    ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        'nullable' =>true,
        'default' => null,
    ), 'Creation time')
    ->addIndex($installer->getIdxName(
        $installer->getTable('olelukoie_news/news'),
        array('published_at'),
        Varien_Db_Adapter_Interface::INDEX_TYPE_INDEX
        ),
        array('published_at'),
        array('type' => Varien_Db_Adapter_Interface::INDEX_TYPE_INDEX)
    )
    ->setComment('News item');

$installer->getConnection()->createTable($table);

$installer->endSetup();