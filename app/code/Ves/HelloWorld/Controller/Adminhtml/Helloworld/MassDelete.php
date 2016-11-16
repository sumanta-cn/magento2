<?php
 
namespace Ves\HelloWorld\Controller\Adminhtml\Helloworld;
 
use Ves\HelloWorld\Controller\Adminhtml\Helloworld;
 
class MassDelete extends Helloworld
{
   /**
    * @return void
    */
   public function execute()
   {
      // Get IDs of the selected news
      $newsIds = $this->getRequest()->getParam('helloworld');
 
        foreach ($newsIds as $newsId) {
            try {
               /** @var $newsModel \Mageworld\SimpleNews\Model\News */
                $newsModel = $this->_newsFactory->create();
                $newsModel->load($newsId)->delete();
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
        }
 
        if (count($newsIds)) {
            $this->messageManager->addSuccess(
                __('A total of %1 record(s) were deleted.', count($newsIds))
            );
        }
 
        $this->_redirect('*/*/index');
   }
}