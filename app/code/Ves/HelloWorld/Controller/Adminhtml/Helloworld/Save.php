<?php
 
namespace Ves\HelloWorld\Controller\Adminhtml\Helloworld;
 
use Ves\HelloWorld\Controller\Adminhtml\Helloworld;
 
class Save extends Helloworld
{
  public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            $id = $this->getRequest()->getParam('id');
            $model = $this->_objectManager->create('Ves\HelloWorld\Model\Test')->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addError(__('This item no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }
 
 
            $model->setData($data);
 
            try {
                $model->save();
                $this->messageManager->addSuccess(__('You saved the item.'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
 
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData($data);
                return $resultRedirect->setPath('*/*/edit', ['tid' => $this->getRequest()->getParam('id')]);
            }
        }
        return $resultRedirect->setPath('*/*/');
    }
    }