<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
namespace ThinkGreen\Reparation\Controller\Adminhtml\Brands;

use Magento\Framework\Controller\ResultFactory;

class Uploader extends \Magento\Backend\App\Action
{
    public $imageUploader;
   
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \ThinkGreen\Reparation\Model\Brands\ImageUploader $imageUploader
    ) {
        parent::__construct($context);
        $this->imageUploader = $imageUploader;
    }
    
    public function _isAllowed()
    {
        return $this->_authorization->isAllowed('ThinkGreen_Reparation::Brands');
    }
   
    public function execute()
    {

        $imageId = $this->_request->getParam('param_name', 'icon');
        try {
            $result = $this->imageUploader->saveFileToTmpDir($imageId);
        } catch (Exception $e) {
            $result = ['error' => $e->getMessage(), 'errorcode' => $e->getCode()];
        }
        return $this->resultFactory->create(ResultFactory::TYPE_JSON)->setData($result);
    }
}