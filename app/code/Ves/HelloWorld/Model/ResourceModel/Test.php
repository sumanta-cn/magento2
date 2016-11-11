<?php
namespace Ves\HelloWorld\Model\ResourceModel;
class Test extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('ves_helloworld_test','ves_helloworld_test_id');
    }
}
