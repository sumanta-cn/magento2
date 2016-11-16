<?php
 
namespace Ves\HelloWorld\Controller\Adminhtml\Helloworld;
 
use Ves\HelloWorld\Controller\Adminhtml\Helloworld;
 
class NewAction extends Helloworld
{
   /**
     * Create helloworld action
     *
     * @return void
     */

   protected $resultForwardFactory;
   
   public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory
    ) {
        $this->resultForwardFactory = $resultForwardFactory;
        parent::__construct($context, $coreRegistry);
    }
 
    public function execute()
    {
        $resultForward = $this->resultForwardFactory->create();
        return $resultForward->forward('edit');
    }
}