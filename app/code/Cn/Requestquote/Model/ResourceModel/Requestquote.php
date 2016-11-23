<?php
namespace Cn\Requestquote\Model\ResourceModel;

class Requestquote extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('requestquote', 'requestquote_id');
    }
}

