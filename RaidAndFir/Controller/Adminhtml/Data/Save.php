<?php
/* */
namespace Iksula\RaidAndFir\Controller\Adminhtml\Data;

use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\Model\View\Result\ForwardFactory;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Message\Manager;
use Magento\Framework\Api\DataObjectHelper;
use Iksula\RaidAndFir\Api\DataRepositoryInterface;
use Iksula\RaidAndFir\Api\Data\DataInterface;
use Iksula\RaidAndFir\Api\Data\DataInterfaceFactory;
use Iksula\RaidAndFir\Controller\Adminhtml\Data;

class Save extends Data
{
    /**
     * @var Manager
     */
    protected $messageManager;

    /**
     * @var DataRepositoryInterface
     */
    protected $dataRepository;

    /**
     * @var DataInterfaceFactory
     */
    protected $dataFactory;

    /**
     * @var DataObjectHelper
     */
    protected $dataObjectHelper;

    public function __construct(
        Registry $registry,
        DataRepositoryInterface $dataRepository,
        PageFactory $resultPageFactory,
        ForwardFactory $resultForwardFactory,
        Manager $messageManager,
        DataInterfaceFactory $dataFactory,
        DataObjectHelper $dataObjectHelper,
        Context $context
    ) {
        $this->messageManager   = $messageManager;
        $this->dataFactory      = $dataFactory;
        $this->dataRepository   = $dataRepository;
        $this->dataObjectHelper  = $dataObjectHelper;
        parent::__construct($registry, $dataRepository, $resultPageFactory, $resultForwardFactory, $context);
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();

        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            $id = $this->getRequest()->getParam('data_id');
            if ($id) {
                $model = $this->dataRepository->getById($id);
            } else {
                unset($data['data_id']);
                $model = $this->dataFactory->create();
            }

            try {

                 if (isset($data['banner_image'][0]['name']) && isset($data['banner_image'][0]['tmp_name'])) {
                $data['banner_image'] = 'raidandfir/tmp/feature/'.$data['banner_image'][0]['name'];
                } elseif (isset($data['banner_image'][0]['name']) && !isset($data['banner_image'][0]['tmp_name'])) {
                    $data['banner_image'] = 'raidandfir/tmp/feature/'.$data['banner_image'][0]['name'];
                } else {
                    $data['banner_image'] = '';
                }

                $model->setData($data);
                $model->save();
                $this->dataObjectHelper->populateWithArray($model, $data, DataInterface::class);
                $this->dataRepository->save($model);
                $this->messageManager->addSuccessMessage(__('You saved this data.'));
                $this->_getSession()->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['data_id' => $model->getId(), '_current' => true]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the data.'));
            }

            $this->_getSession()->setFormData($data);
            return $resultRedirect->setPath('*/*/edit', ['data_id' => $this->getRequest()->getParam('data_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}
