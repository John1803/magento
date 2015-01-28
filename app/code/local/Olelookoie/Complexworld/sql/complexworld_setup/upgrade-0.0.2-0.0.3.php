<?php
$installer = $this;

$installer->startSetup();

$this->addAttribute('complexworld_eavblogpost', 'date', array(
    'type'              => 'datetime',
    'label'             => 'Post Date',
    'input'             => 'datetime',
    'required'          => false,
));

$installer->endSetup();