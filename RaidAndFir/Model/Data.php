<?php
/* */
namespace Iksula\RaidAndFir\Model;

use Magento\Framework\Model\AbstractModel;
use Iksula\RaidAndFir\Api\Data\DataInterface;

class Data extends AbstractModel implements DataInterface
{
    /**
     * Cache tag
     */
    const CACHE_TAG = 'iksula_sample_data';

    /**
     * Initialise resource model
     * @codingStandardsIgnoreStart
     */
    protected function _construct()
    {
        // @codingStandardsIgnoreEnd
        $this->_init('Iksula\RaidAndFir\Model\ResourceModel\Data');
    }

    /**
     * Get cache identities
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getDataTitle()
    {
        return $this->getData(DataInterface::DATA_TITLE);
    }

    /**
     * Set title
     *
     * @param $title
     * @return $this
     */
    public function setDataTitle($title)
    {
        return $this->setData(DataInterface::DATA_TITLE, $title);
    }

    /**
     * Get urlkey
     *
     * @return string
     */
    public function getUrlkey()
    {
        return $this->getData(DataInterface::DATA_TITLE);
    }

    /**
     * Set data urlkey
     *
     * @param $urlkey
     * @return $this
     */
    public function setUrlkey($urlkey)
    {
        return $this->setData(DataInterface::DATA_TITLE, $urlkey);
    }


    /**
     * Get data description
     *
     * @return string
     */
    public function getDataDescription()
    {
        return $this->getData(DataInterface::DATA_DESCRIPTION);
    }

    /**
     * Set data description
     *
     * @param $description
     * @return $this
     */
    public function setDataDescription($description)
    {
        return $this->setData(DataInterface::DATA_DESCRIPTION, $description);
    }

     /**
     * Get image
     *
     * @return string
     */
    public function getBannerImage()
    {
        return $this->getData(DataInterface::BANNER_IMAGE);
    }

    /**
     * Set data image
     *
     * @param $image
     * @return $this
     */
    public function setBannerImage($image)
    {
        return $this->setData(DataInterface::BANNER_IMAGE, $image);
    }

    /**
     * Get is active
     *
     * @return bool|int
     */
    public function getIsActive()
    {
        return $this->getData(DataInterface::IS_ACTIVE);
    }

    /**
     * Set is active
     *
     * @param $isActive
     * @return $this
     */
    public function setIsActive($isActive)
    {
        return $this->setData(DataInterface::IS_ACTIVE, $isActive);
    }

    /**
     * Get created at
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->getData(DataInterface::CREATED_AT);
    }

    /**
     * Set created at
     *
     * @param $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(DataInterface::CREATED_AT, $createdAt);
    }

    /**
     * Get updated at
     *
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->getData(DataInterface::UPDATED_AT);
    }

    /**
     * Set updated at
     *
     * @param $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(DataInterface::UPDATED_AT, $updatedAt);
    }
}
