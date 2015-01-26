<?php

class Olelookoie_Weblog_Model_Resource_Blogpost extends Mage_Core_Model_Resource_Db_Abstract
{
    public function _construct()
    {
        $this->_init('weblog/blogpost', 'blogpost_id');
    }
}