<?php
namespace Iksula\RaidAndFir\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface DataSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get data list.
     *
     * @return \Iksula\RaidAndFir\Api\Data\DataInterface[]
     */
    public function getItems();

    /**
     * Set data list.
     *
     * @param \Iksula\RaidAndFir\Api\Data\DataInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
