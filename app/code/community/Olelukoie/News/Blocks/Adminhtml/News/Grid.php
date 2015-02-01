<?php

class Olelukoie_News_Blocks_Adminhtml_News_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * Init Grid default properties
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('news_list_grid');
        $this->setDefaultSort('created_at');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }
    /**
     * Prepare collection for Grid
     *
     * @return Olelukoie_News_Blocks_Adminhtml_News_Grid
     */
    protected function _prepareCollection()
    {
        {
            $collection = Mage::getModel('olelukoie_news/news')->getResourceCollection();
            $this->setCollection($collection);
            return parent::_prepareCollection();
        }
    }
        /**
         * Prepare Grid columns
         *
         * @return Mage_Adminhtml_Block_Catalog_Search_Grid
         */
    protected function _prepareColumns()
    {
        $this->addColumn('id', ['header' => Mage::helper('olelukoie_news')->__('ID'),
                                'width' => '50px',
                                'index'  => 'id',
        ]);
        $this->addColumn('title', ['header' => Mage::helper('olelukoie_news')->__('News Title'),
                                    'index' => 'title',
        ]);
        $this->addColumn('author', ['header' => Mage::helper('olelukoie_news')->__('Author'),
                                    'index'  => 'author',
        ]);
        $this->addColumn('published_at', ['header' => Mage::helper('olelukoie_news')->__('Published On'),
                                          'sortable' => true,
                                          'width' => '170px',
                                          'index' => 'published_at',
                                          'type' => 'date',
        ]);
        $this->addColumn('created_at', ['header' => Mage::helper('olelukoie_news')->__('Created'),
                                        'sortable' => true,
                                        'width' => '170px',
                                        'index' => 'created_at',
                                        'type' => 'datetime',
        ]);
        $this->addColumn('action', ['header' => Mage::helper('olelukoie_news')->__('Action'),
                                    'width' => '100px',
                                    'type' => 'action',
                                    'getter' => 'getId',
                                    'actions' => [['caption' => Mage::helper('olelukoie_news')->__('Edit'),
                                                    'url' => ['base' => '*/*/edit'],
                                                    'field' => 'id', ]],
                                    'filter' => false,
                                    'sortable' => false,
                                    'index' => 'news',
        ]);

        return parent::_prepareColumns();
    }

    /**
     * Return row URL for js event handlers
     *
     * @return string
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', ['id' => $row->getId()]);
    }
    /**
     * Grid url getter
     *
     * @return string current grid url
     */
    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', ['_current' => true]);
    }
}