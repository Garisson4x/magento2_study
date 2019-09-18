<?php
namespace Shellpea\Module\Plugin;
class GetRouterList
{
    protected $logger;

    public function __construct(\Psr\Log\LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
    public function afterNext(\Magento\Framework\App\RouterList $subject, $result) {
        // for ($i = 0; $i < count($result); $i ++) {
            $this->logger->info(get_class($result));
    }
}
