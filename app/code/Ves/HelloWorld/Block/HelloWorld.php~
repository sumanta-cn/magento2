<?php 
namespace Ves\HelloWorld\Block;
//use Magento\Framework\App\RequestInterface;
 
class HelloWorld extends \Magento\Framework\View\Element\Template
{
	
	public function _prepareLayout()
	{
		return parent::_prepareLayout();
		//$firstname = $this->getRequest()->getParam('firstname');
		//$model = $this->_objectManager->create('Ves\HelloWorld\Model\Test');
       		//$model->setFirstname($this->getRequest()->getParam('firstname'));
        	//$model->save();
    		//$this->setFirstname($this->getRequest()->getParam('firstname'));
		//$this->_logger->log(\Psr\Log\LogLevel::DEBUG,$firstname);
	}
	
	 
	 public function get()
    {
	//return '/ves/helloworld/index';
	return $this->_urlBuilder->getUrl('helloworld/index/index');
}
}
