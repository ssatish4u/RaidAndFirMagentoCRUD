<?php
namespace Iksula\RaidAndFir\Controller\Adminhtml\Data;

use Iksula\RaidAndFir\Controller\Adminhtml\Data;

class Index extends Data
{
    /**
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        return $this->resultPageFactory->create();
    }
}
