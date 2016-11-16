<?php
 
namespace Ves\HelloWorld\Controller\Adminhtml\Helloworld;
 
use Ves\HelloWorld\Controller\Adminhtml\Helloworld;
 
class Edit extends Helloworld
{
   protected $resultPageFactory;

   public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context, $coreRegistry);
    }
 

   public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $model = $this->_objectManager->create('Ves\HelloWorld\Model\Test');
 
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This item no longer exists.'));
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }
     
        $data = $this->_objectManager->get('Magento\Backend\Model\Session')->getFormData(true);
        if (!empty($data)) {
            $model->setData($data);
        }
 
        $this->_coreRegistry->register('test_item', $model);
 
        $resultPage = $this->resultPageFactory->create();
 
        $this->initPage($resultPage)->addBreadcrumb(
            $id ? __('Edit Item') : __('New Item'),
            $id ? __('Edit Item') : __('New Item')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Items'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? $model->getName() : __('New Item'));
        return $resultPage;
    }
}