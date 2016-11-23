<?php 
namespace Cn\Requestquote\Block;

class Requestquote extends \Magento\Framework\View\Element\Template
{
	
	public function _prepareLayout()
	{
		return parent::_prepareLayout();
			}
	
	 
	 public function get()
    {
	
	return $this->_urlBuilder->getUrl('requestquote/index/index');
}
}
