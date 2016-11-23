<?php
namespace Cn\Requestquote\Model;

class Requestquote extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Cn\Requestquote\Model\ResourceModel\Requestquote');
    }
}



