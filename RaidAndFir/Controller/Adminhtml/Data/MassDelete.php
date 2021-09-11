<?php
namespace Iksula\RaidAndFir\Controller\Adminhtml\Data;

use Iksula\RaidAndFir\Model\Data;

class MassDelete extends MassAction
{
    /**
     * @param Data $data
     * @return $this
     */
    protected function massAction(Data $data)
    {
        $this->dataRepository->delete($data);
        return $this;
    }
}
