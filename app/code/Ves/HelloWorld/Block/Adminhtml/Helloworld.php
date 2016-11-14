<?php
 
namespace Ves\HelloWorld\Block\Adminhtml;
 
use Magento\Backend\Block\Widget\Grid\Container;
 
class Helloworld extends Container
{
   /**
     * Constructor
     *
     * @return void
     */
   protected function _construct()
    {
        $this->_controller = 'adminhtml_helloworld';
        $this->_blockGroup = 'Ves_HelloWorld';
        $this->_headerText = __('Manage Requestquote');
        $this->_addButtonLabel = __('Add Requestquote');
        parent::_construct();
    }
}
