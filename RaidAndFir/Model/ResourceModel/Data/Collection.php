<?php
/* */
namespace Iksula\RaidAndFir\Model\ResourceModel\Data;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     * @codingStandardsIgnoreStart
     */
    protected $_idFieldName = 'data_id';

    /**
     * Collection initialisation
     */
    protected function _construct()
    {
        // @codingStandardsIgnoreEnd
        $this->_init('Iksula\RaidAndFir\Model\Data', 'Iksula\RaidAndFir\Model\ResourceModel\Data');
    }
}
