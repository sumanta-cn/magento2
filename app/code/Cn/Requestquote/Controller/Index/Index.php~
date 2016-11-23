<?php 
namespace Ves\HelloWorld\Controller\Index;  
class Index extends \Magento\Framework\App\Action\Action {
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
	$post = $this->getRequest()->getParams();
	//$lastname = $this->getRequest()->getParam('lastname');
	//$this->_logger->log(\Psr\Log\LogLevel::DEBUG,$post);
	        if ($post) {
            // Retrieve your form data
            $firstname = $post['firstname'];
            $lastname = $post['lastname'];
            $email = $post['email'];
            $mobile = $post['mobile'];
            $requestquotedetails = $post['requestquotedetails'];
            $productid = $post['productid'];
            $productname = $post['productname'];  
	$model = $this->_objectManager->create('Ves\HelloWorld\Model\Test');
    $model->setFirstname($firstname);
	$model->setLastname($lastname);
    $model->setEmail($email);
    $model->setMobile($mobile);
    $model->setRequestquotedetails($requestquotedetails);
    $model->setProductid($productid);
    $model->setProductname($productname);
    $model->save();
		}
    	$resultPage = $this->resultPageFactory->create();
    	$resultPage->getConfig()->getTitle()->prepend(__('HelloWorld'));
    	return $resultPage;
	
    }
	

	 
}
