<?php

namespace ThinkGreen\Reparation\Block\Reparation;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Store\Model\StoreManagerInterface;

class View extends \Magento\Framework\View\Element\Template
{
    protected $_coreRegistry = null;
    protected $_reparation;
    protected $_brands;
    protected $httpContext;
    protected $request;
    protected $_filesystem;
    protected $storeManager;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \ThinkGreen\Reparation\Model\Reparation $reparation,
        \ThinkGreen\Reparation\Model\Brands $brands,
        \Magento\Framework\App\Http\Context $httpContext,
        \Magento\Framework\Filesystem $filesystem,
        StoreManagerInterface $storeManager,

        array $data = []
    )
    {
        $this->_reparation = $reparation;
        $this->_brands = $brands;
        $this->_coreRegistry = $registry;
        $this->request = $context->getRequest();
        $this->httpContext = $httpContext;
        $this->_filesystem = $filesystem;
        $this->storeManager = $storeManager;

        parent::__construct($context, $data);
    }

    public function _construct()
    {
        parent::_construct();

    }

    public function getMediaDirectory(){
        return  $this->storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
    }
    public function getCurrentReparation()
    {
        $reparation = $this->_coreRegistry->registry('current_reparation');
        if ($reparation) {
            $this->setData('current_reparation', $reparation);
        }
        return $reparation;
    }

    

    protected function _prepareLayout()
    {
        $reparation = $this->getCurrentReparation();
        $pageTitle = $reparation->getName();
        $this->pageConfig->addBodyClass('reparation-model-view');
        if ($pageTitle) {
            $this->pageConfig->getTitle()->set($pageTitle);
        }
        return parent::_prepareLayout();
    }


}
