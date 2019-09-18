<?php
namespace Shellpea\Module;

use Psr\Log\LoggerInterface;
use Magento\Framework\App\FrontController;
use Magento\Framework\App\RouterListInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\App\Request\ValidatorInterface as RequestValidator;
use Magento\Framework\Message\ManagerInterface as MessageManager;

class MyFrontController extends FrontController
{

    protected $logger;

    protected $_routerList;

    public function __construct(
        RouterListInterface $routerList,
        ResponseInterface $response,
        ?RequestValidator $requestValidator = null,
        ?MessageManager $messageManager = null,
        ?LoggerInterface $logger = null
        ) {
        parent::__construct($routerList, $response, $requestValidator, $messageManager, $logger);
        $this->logger = $logger
            ?? ObjectManager::getInstance()->get(LoggerInterface::class);
        }

    public function dispatch(\Magento\Framework\App\RequestInterface $request)
    {
        foreach ($this->_routerList as $router)
        {
            $this->logger->info(get_class($router));
        }
        return parent::dispatch($request);
    }
}
