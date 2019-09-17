<?php
namespace Shellpea\Module\Observer;
use \Magento\Framework\Event\ObserverInterface;
class RecordRouters implements ObserverInterface
{
    protected $logger;
    public function __construct(
    \Psr\Log\LoggerInterface $logger,
    \Magento\Framework\App\Router\Base $standard,
    \Magento\Framework\App\Router\DefaultRouter $default,
    \Magento\Cms\Controller\Router $cms,
    \Magento\Robots\Controller\Router $robots,
    \Magento\UrlRewrite\Controller\Router $urlrewrite)
    {
        $this->logger = $logger;
        $this->standard = $standard;
        $this->default = $default;
        $this->cms = $cms;
        $this->robots = $robots;
        $this->urlrewrite = $urlrewrite;
    }
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $nameRouters = "";
        $nameRouters = $nameRouters . get_class($this->standard)."\n";
        $nameRouters = $nameRouters . get_class($this->default)."\n";
        $nameRouters = $nameRouters . get_class($this->cms)."\n";
        $nameRouters = $nameRouters . get_class($this->robots)."\n";
        $nameRouters = $nameRouters . get_class($this->urlrewrite)."\n";
        $this->logger->info($nameRouters);
    }
}
