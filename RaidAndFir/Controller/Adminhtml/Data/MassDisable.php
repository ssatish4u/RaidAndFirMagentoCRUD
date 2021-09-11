<?php
/* */
namespace Iksula\RaidAndFir\Controller\Adminhtml\Data;

use Iksula\RaidAndFir\Model\Data;

class MassDisable extends MassAction
{
    /**
     * @param Data $data
     * @return $this
     */
    protected function massAction(Data $data)
    {
        $data->setIsActive(false);
        $this->dataRepository->save($data);
        return $this;
    }
}
