<?php
$installer = $this;

$installer->startSetup();

$this->addAttribute('complexworld_eavblogpost', 'content', array(
    'type'              => 'text',
    'label'             => 'Content',
    'input'             => 'textarea',
));

$installer->endSetup();