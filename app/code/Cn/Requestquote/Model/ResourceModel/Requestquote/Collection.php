<?php
namespace Cn\Requestquote\Model\ResourceModel\Requestquote;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * @var string
     */
    protected $_idFieldName = 'requestquote_id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Cn\Requestquote\Model\Requestquote', 'Cn\Requestquote\Model\ResourceModel\Requestquote');
        $this->_map['fields']['requestquote_id'] = 'main_table.requestquote_id';
    }

    /**
     * Prepare page's statuses.
     * Available event cms_page_get_available_statuses to customize statuses.
     *
     * @return array
     */
    public function getAvailableStatuses()
    {
        return [self::STATUS_ENABLED => __('Enabled'), self::STATUS_DISABLED => __('Disabled')];
    }
}


