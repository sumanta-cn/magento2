<?php
 
namespace Ves\HelloWorld\Controller\Adminhtml;
 
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
//use Ves\HelloWorld\Model\ResourceModel\Test;
 const PARAM_CRUD_ID = 'id';
abstract class Helloworld extends Action
{
       protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Ves_HelloWorld::manage_requestquote');
    }
}
 
