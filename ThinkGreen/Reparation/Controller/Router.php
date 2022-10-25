<?php

namespace ThinkGreen\Reparation\Controller;

use Magento\Framework\App\RouterInterface;
use Magento\Framework\App\ActionFactory;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\DataObject;
use Magento\Framework\Event\ManagerInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\Url;
use ThinkGreen\Reparation\Model\Reparation;
use ThinkGreen\Reparation\Model\Brands;

class Router implements RouterInterface
{
    protected $actionFactory;
    protected $eventManager;
    protected $response;
    protected $dispatched;
    protected $reparationCollection;
    protected $brandsCollection;
    //protected $blogHelper;
    protected $storeManager;

    public function __construct(
        ActionFactory $actionFactory,
        ResponseInterface $response,
        ManagerInterface $eventManager,
        Brands $brandsCollection,
        Reparation $reparationCollection,
        StoreManagerInterface $storeManager
    )
    {
        $this->actionFactory = $actionFactory;
        $this->eventManager = $eventManager;
        $this->response = $response;
        $this->_brandsCollection = $brandsCollection;
        $this->_reparationCollection = $reparationCollection;
        $this->storeManager = $storeManager;
    }

    public function match(RequestInterface $request)
    {
        if (!$this->dispatched) {
            $route = 'reparationer';
            $urlKey = trim($request->getPathInfo(), '/');
            $origUrlKey = $urlKey;
            $condition = new DataObject(['url_key' => $urlKey, 'continue' => true]);
            $this->eventManager->dispatch(
                'thinkgreen_reparations_controller_router_match_before',
                ['router' => $this, 'condition' => $condition]
            );
            $urlKey = $condition->getUrlKey();
            if ($condition->getRedirectUrl()) {
                $this->response->setRedirect($condition->getRedirectUrl());
                $request->setDispatched(true);
                return $this->actionFactory->create(
                    'Magento\Framework\App\Action\Redirect',
                    ['request' => $request]
                );
            }
            if (!$condition->getContinue()) {
                return null;
            }
            if ($urlKey == $route) {
                $request->setModuleName('reparationer')
                    ->setControllerName('index')
                    ->setActionName('index');
                $request->setAlias(Url::REWRITE_REQUEST_PATH_ALIAS, $urlKey);
                $this->dispatched = true;
                return $this->actionFactory->create(
                    'Magento\Framework\App\Action\Forward',
                    ['request' => $request]
                );
            }
            $identifiers = explode('/', $urlKey);
            if (count($identifiers) == 2) {
                $identifier = $identifiers[1];
                $Brands = $this->_brandsCollection->getCollection()
                    ->addFieldToFilter('url_key', array('eq' => $identifier))
                    ->getFirstItem();
                if ($Brands && $Brands->getId()) {
                    $request->setModuleName('reparationer')
                        ->setControllerName('brands')
                        ->setActionName('view')
                        ->setParam('brands_id', $Brands->getId());
                    $request->setAlias(\Magento\Framework\Url::REWRITE_REQUEST_PATH_ALIAS, $origUrlKey);
                    $request->setDispatched(true);
                    $this->dispatched = true;
                    return $this->actionFactory->create(
                        'Magento\Framework\App\Action\Forward',
                        ['request' => $request]
                    );
                }
                $post = $this->_reparationCollection->getCollection()
                    ->addFieldToFilter('url_key', array('eq' => $identifier))
                    ->getFirstItem();
                if ($post && $post->getId()) {
                    $request->setModuleName('reparationer')
                        ->setControllerName('Reparation')
                        ->setActionName('view')
                        ->setParam('reparation_id', $post->getId());
                    $request->setAlias(\Magento\Framework\Url::REWRITE_REQUEST_PATH_ALIAS, $origUrlKey);
                    $request->setDispatched(true);
                    $this->dispatched = true;
                    return $this->actionFactory->create(
                        'Magento\Framework\App\Action\Forward',
                        ['request' => $request]
                    );
                }
            }
            if (count($identifiers) == 3) {
                $identifier = $identifiers[2];
                $post = $this->_reparationCollection->getCollection()
                    ->addFieldToFilter('url_key', array('eq' => $identifier))
                    ->getFirstItem();
                if ($post && $post->getId()) {
                    $request->setModuleName('Reparations')
                        ->setControllerName('Reparation')
                        ->setActionName('view')
                        ->setParam('Reparation_id', $post->getId());
                    $request->setAlias(\Magento\Framework\Url::REWRITE_REQUEST_PATH_ALIAS, $origUrlKey);
                    $request->setDispatched(true);
                    $this->dispatched = true;
                    return $this->actionFactory->create(
                        'Magento\Framework\App\Action\Forward',
                        ['request' => $request]
                    );
                }
            }
        }
    }
}
