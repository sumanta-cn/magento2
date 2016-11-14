<?php 
namespace Ves\HelloWorld\Block;

class HelloWorld extends \Magento\Framework\View\Element\Template
{
	
	public function _prepareLayout()
	{
		return parent::_prepareLayout();
			}
	
	 
	 public function get()
    {
	
	return $this->_urlBuilder->getUrl('helloworld/index/index');
}
}
