<?php
namespace Shellpea\Module\Observer;
use \Magento\Framework\Event\ObserverInterface;
class RecordHtml implements ObserverInterface
{
	protected $logger;

	public function __construct(
        \Psr\Log\LoggerInterface $logger)
	{
		$this->logger = $logger;
	}
	public function execute(\Magento\Framework\Event\Observer $observer)
	{
        $response = $observer->getEvent()->getResponse();
		$html = $response->getBody();
		$this->logger->info($html);
	}
}
