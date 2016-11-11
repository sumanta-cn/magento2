<?php
namespace Ves\HelloWorld\Model\ResourceModel\Test;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Ves\HelloWorld\Model\Test','Ves\HelloWorld\Model\ResourceModel\Test');
    }
}
