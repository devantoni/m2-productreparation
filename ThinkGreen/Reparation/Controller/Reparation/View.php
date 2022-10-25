<?php

namespace ThinkGreen\Reparation\Controller\Reparation;

use Magento\Framework\Controller\ResultFactory;

class View extends \Magento\Framework\App\Action\Action
{
    protected $resultForwardFactory;
    protected $_reparationModel;
    protected $_coreRegistry = null;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Store\Model\StoreManager $storeManager,
        \ThinkGreen\Reparation\Model\Reparation $reparationModel,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\Controller\Result\ForwardFactory $resultForwardFactory
    )
    {
        $this->_reparationModel = $reparationModel;
        $this->resultForwardFactory = $resultForwardFactory;
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context);
    }

    public function _initReparation()
    {
        $reparationId = (int)$this->getRequest()->getParam('reparation_id', false);
        if (!$reparationId) {
            return false;
        }
        try {
            $reparation = $this->_reparationModel->load($reparationId);
        } catch (\Exception $e) {
            return false;
        }
        $this->_coreRegistry->register('current_reparation', $reparation);
        return $reparation;
    }

    public function execute()
    {
        
        $reparation = $this->_initReparation();
        if ($reparation) {
            $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
            return $resultPage;
        } else {
            return $this->resultForwardFactory->create()->forward('noroute');
        }
    }
}
