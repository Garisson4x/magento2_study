<?php

namespace Shellpea\Module\Observer;

use \Magento\Framework\Event\ObserverInterface;

class RecordAction implements ObserverInterface
{
	private $logger;

	private $eventManager;

	// public function __construct(
    //     \Psr\Log\LoggerInterface $logger)
	// {
	// 	$this->logger = $logger;
	// }

	public function execute(\Magento\Framework\Event\Observer $observer)
	{
		$request = $observer->getEvent()->getRequest();
		$url = $request->getPathInfo();
		file_put_contents(BP.'/var/log/test.log', $url);

		// $this->logger->alert('Present Url' . ', ', [$url , '']);

	}

}
