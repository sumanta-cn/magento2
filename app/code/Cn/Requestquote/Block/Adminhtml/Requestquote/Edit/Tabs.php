<?php
namespace Cn\Requestquote\Block\Adminhtml\Requestquote\Edit;

/**
 * Admin page left menu
 */
class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('requestquote_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Requestquote Information'));
    }
}
