<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace ThinkGreen\Reparation\Controller\Adminhtml\Reparation;

use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Backend\App\Action
{

    protected $dataPersistor;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
    ) {
        $this->dataPersistor = $dataPersistor;
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            $id = $this->getRequest()->getParam('reparation_id');
        
            $model = $this->_objectManager->create(\ThinkGreen\Reparation\Model\Reparation::class)->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addErrorMessage(__('This Reparation no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }
            if (isset($data['image'][0]['name'])) {
                $data['image'] = $data['image'][0]['name'];
            } else {
                $data['image'] = null;
            }
            $model->setData($data);
        
            try {
                $model->save();
                $this->messageManager->addSuccessMessage(__('You saved the Reparation.'));
                $this->dataPersistor->clear('thinkgreen_reparation_reparation');
        
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['reparation_id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the Reparation.'));
            }
        
            $this->dataPersistor->set('thinkgreen_reparation_reparation', $data);
            return $resultRedirect->setPath('*/*/edit', ['reparation_id' => $this->getRequest()->getParam('reparation_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}

