<?php
 
namespace Ves\HelloWorld\Controller\Adminhtml\Helloworld;

class Index extends \Magento\Backend\App\Action  /**
     * @return void
     */
{
const ADMIN_RESOURCE = 'Ves_HelloWorld::Requestquote';

protected $resultPageFactory;

public function __construct(
            \Magento\Backend\App\Action\Context $context,
            \Magento\Framework\Registry $coreRegistry,
            \Magento\Framework\View\Result\PageFactory $resultPageFactory
){
     
    $this->resultPageFactory = $resultPageFactory;
    parent::__construct($context,$coreRegistry);
}

   public function execute()
   {
        
    $resultPage = $this->resultPageFactory->create();
    $resultPage->getConfig()->getTitle()->prepend(__('Requestquote'));
    return $resultPage;
   }
}
 
