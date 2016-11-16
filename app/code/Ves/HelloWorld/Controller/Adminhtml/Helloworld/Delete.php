<?php
 
namespace Ves\HelloWorld\Controller\Adminhtml\Helloworld;
 
use Ves\HelloWorld\Controller\Adminhtml\Helloworld;
 
class Delete extends Helloworld
{
   /**
    * @return void
    */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('id');
        if ($id) {
            try {
                 
                $model = $this->_objectManager->create('Ves\HelloWorld\Model\Test');
                $model->load($id);
                $model->delete();
                 
                $this->messageManager->addSuccess(__('You deleted the item.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }
        $this->messageManager->addError(__('We can\'t find the item to delete.'));
        return $resultRedirect->setPath('*/*/');
    }
}



