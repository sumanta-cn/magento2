<?php 
namespace Ves\HelloWorld\Controller\Index;  
class Save extends \Magento\Framework\App\Action\Action {
    /** @var  \Magento\Framework\View\Result\Page */
    protected $resultPageFactory;
    /**      * @param \Magento\Framework\App\Action\Context $context      */
    public function __construct(\Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory)     {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }
 
    /**
     * Blog Index, shows a list of recent blog posts.
     *
     * @return \Magento\Framework\View\Result\PageFactory
     */
    public function execute()
    {
       $model = $this->_objectManager->create('Ves\HelloWorld\Model\Test');
       $model->setFirstname($this->getRequest()->getParam('firstname'));
       $model->save();
      $resultPage = $this->resultPageFactory->create();
      $resultPage->getConfig()->getTitle()->prepend(__('HelloWorld'));
      return $resultPage;
	
    }
	 
}
